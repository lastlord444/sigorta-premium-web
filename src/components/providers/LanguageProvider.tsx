"use client";

import React, {
  createContext,
  useContext,
  useState,
  useEffect,
  useCallback,
  useMemo,
} from "react";
import {
  Language,
  LanguageOption,
  SiteTranslations,
  supportedLanguages,
  translations,
} from "@/data/translations";

interface LanguageContextType {
  language: Language;
  setLanguage: (lang: Language) => void;
  t: SiteTranslations;
  supportedLanguages: LanguageOption[];
  currentLanguageOption: LanguageOption;
}

const LanguageContext = createContext<LanguageContextType | null>(null);

const STORAGE_KEY = "aura_preferred_lang";

export function LanguageProvider({ children }: { children: React.ReactNode }) {
  const [language, setLanguageState] = useState<Language>("en");
  const [mounted, setMounted] = useState(false);

  // Initialize from localStorage or navigator language
  useEffect(() => {
    setMounted(true);
    try {
      const savedLang = localStorage.getItem(STORAGE_KEY) as Language | null;
      if (
        savedLang &&
        supportedLanguages.some((l) => l.code === savedLang)
      ) {
        setLanguageState(savedLang);
        document.documentElement.lang = savedLang;
        return;
      }

      // If no saved preference, try browser language
      const browserLang = navigator.language?.slice(0, 2).toLowerCase();
      const matched = supportedLanguages.find((l) => l.code === browserLang);
      if (matched) {
        setLanguageState(matched.code);
        document.documentElement.lang = matched.code;
      } else {
        document.documentElement.lang = "en";
      }
    } catch {
      // localStorage may be restricted in private browsing
    }
  }, []);

  const setLanguage = useCallback((newLang: Language) => {
    if (!supportedLanguages.some((l) => l.code === newLang)) return;
    setLanguageState(newLang);
    try {
      localStorage.setItem(STORAGE_KEY, newLang);
      document.documentElement.lang = newLang;
    } catch {
      // Ignore storage errors
    }
  }, []);

  const currentLanguageOption = useMemo(() => {
    return (
      supportedLanguages.find((l) => l.code === language) ||
      supportedLanguages[0]
    );
  }, [language]);

  const currentTranslations = useMemo(() => {
    return translations[language] || translations.en;
  }, [language]);

  const value = useMemo(
    () => ({
      language,
      setLanguage,
      t: currentTranslations,
      supportedLanguages,
      currentLanguageOption,
    }),
    [language, setLanguage, currentTranslations, currentLanguageOption]
  );

  return (
    <LanguageContext.Provider value={value}>
      {children}
    </LanguageContext.Provider>
  );
}

export function useLanguage(): LanguageContextType {
  const context = useContext(LanguageContext);
  if (!context) {
    // Fallback safe return if used outside provider during SSR/testing
    return {
      language: "en",
      setLanguage: () => {},
      t: translations.en,
      supportedLanguages,
      currentLanguageOption: supportedLanguages[0],
    };
  }
  return context;
}
