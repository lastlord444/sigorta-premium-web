"use client";

import React, { useRef, useState } from "react";
import { motion } from "framer-motion";
import { cn } from "@/lib/utils";

interface MagneticButtonProps extends React.ButtonHTMLAttributes<HTMLButtonElement> {
  children: React.ReactNode;
  variant?: "primary" | "secondary" | "outline" | "ghost";
  size?: "sm" | "md" | "lg";
  className?: string;
  onClick?: () => void;
  magneticStrength?: number;
}

export default function MagneticButton({
  children,
  variant = "primary",
  size = "md",
  className,
  onClick,
  magneticStrength = 0.35,
  ...props
}: MagneticButtonProps) {
  const buttonRef = useRef<HTMLButtonElement>(null);
  const [position, setPosition] = useState({ x: 0, y: 0 });

  const handleMouseMove = (e: React.MouseEvent<HTMLButtonElement>) => {
    if (!buttonRef.current) return;
    const { clientX, clientY } = e;
    const { left, top, width, height } = buttonRef.current.getBoundingClientRect();
    const centerX = left + width / 2;
    const centerY = top + height / 2;
    const deltaX = (clientX - centerX) * magneticStrength;
    const deltaY = (clientY - centerY) * magneticStrength;
    setPosition({ x: deltaX, y: deltaY });
  };

  const handleMouseLeave = () => {
    setPosition({ x: 0, y: 0 });
  };

  const variantStyles = {
    primary:
      "relative bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 text-white font-medium shadow-[0_0_24px_rgba(0,102,255,0.35)] hover:shadow-[0_0_36px_rgba(0,102,255,0.6)] border border-blue-400/40 hover:border-blue-300/80 transition-shadow duration-300",
    secondary:
      "relative bg-white/5 hover:bg-white/10 text-silver-100 font-medium border border-white/15 hover:border-white/30 backdrop-blur-md transition-colors duration-300",
    outline:
      "relative bg-transparent hover:bg-electric/10 text-electric-light font-medium border border-electric/40 hover:border-electric transition-all duration-300",
    ghost:
      "relative bg-transparent hover:bg-white/5 text-silver-300 hover:text-white transition-colors duration-300",
  };

  const sizeStyles = {
    sm: "px-4 py-2 text-xs rounded-full",
    md: "px-6 py-3 text-sm rounded-full",
    lg: "px-8 py-4 text-base rounded-full",
  };

  return (
    <motion.button
      ref={buttonRef}
      onMouseMove={handleMouseMove}
      onMouseLeave={handleMouseLeave}
      animate={{ x: position.x, y: position.y }}
      transition={{ type: "spring", stiffness: 250, damping: 18, mass: 0.2 }}
      onClick={onClick}
      className={cn(
        "magnetic-target inline-flex items-center justify-center gap-2 tracking-wide uppercase font-semibold select-none overflow-hidden group cursor-pointer",
        variantStyles[variant],
        sizeStyles[size],
        className
      )}
      {...(props as any)}
    >
      <span className="relative z-10 flex items-center gap-2">{children}</span>
      {/* Subtle shine sweep overlay on hover */}
      <div className="absolute inset-0 -translate-x-full group-hover:translate-x-full transition-transform duration-700 bg-gradient-to-r from-transparent via-white/20 to-transparent pointer-events-none" />
    </motion.button>
  );
}
