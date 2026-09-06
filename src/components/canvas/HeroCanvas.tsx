"use client";

import React, { useEffect, useRef } from "react";
import * as THREE from "three";

export default function HeroCanvas() {
  const containerRef = useRef<HTMLDivElement>(null);
  const canvasRef = useRef<HTMLCanvasElement>(null);

  useEffect(() => {
    if (!canvasRef.current || !containerRef.current) return;

    // Check prefers-reduced-motion
    const prefersReducedMotion = window.matchMedia(
      "(prefers-reduced-motion: reduce)"
    ).matches;

    const isMobile = window.innerWidth < 768;

    // SCENE, CAMERA, RENDERER
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(
      45,
      containerRef.current.clientWidth / containerRef.current.clientHeight,
      0.1,
      1000
    );
    camera.position.z = 7.5;

    const renderer = new THREE.WebGLRenderer({
      canvas: canvasRef.current,
      alpha: true,
      antialias: !isMobile,
      powerPreference: "high-performance",
    });

    const updateSize = () => {
      if (!containerRef.current) return;
      const width = containerRef.current.clientWidth;
      const height = containerRef.current.clientHeight;
      camera.aspect = width / height;
      camera.updateProjectionMatrix();
      renderer.setSize(width, height);
      renderer.setPixelRatio(Math.min(window.devicePixelRatio, isMobile ? 1 : 1.8));
    };

    updateSize();

    // 3D GROUP FOR HERO OBJECT
    const heroGroup = new THREE.Group();
    scene.add(heroGroup);

    // 1. OUTER PROTECTIVE PRISM (High-poly Octahedron / Luxury Diamond Shield)
    const prismGeo = new THREE.OctahedronGeometry(2.1, isMobile ? 0 : 1);
    const prismMat = new THREE.MeshPhysicalMaterial({
      color: 0x050d24,
      emissive: 0x001438,
      roughness: 0.15,
      metalness: 0.92,
      reflectivity: 0.9,
      clearcoat: 0.8,
      clearcoatRoughness: 0.2,
      wireframe: false,
    });
    const prismMesh = new THREE.Mesh(prismGeo, prismMat);
    heroGroup.add(prismMesh);

    // 1b. WIREFRAME ACCENT OVERLAY (Subtle high-tech contour)
    const wireGeo = new THREE.OctahedronGeometry(2.12, isMobile ? 0 : 1);
    const wireMat = new THREE.MeshBasicMaterial({
      color: 0x0066ff,
      wireframe: true,
      transparent: true,
      opacity: 0.35,
    });
    const wireMesh = new THREE.Mesh(wireGeo, wireMat);
    heroGroup.add(wireMesh);

    // 2. INNER GLOWING CORE (Safe harbor / Protection metaphor)
    const coreGeo = new THREE.IcosahedronGeometry(1.0, 1);
    const coreMat = new THREE.MeshStandardMaterial({
      color: 0x00f0ff,
      emissive: 0x0066ff,
      emissiveIntensity: 0.9,
      roughness: 0.3,
      metalness: 0.6,
      wireframe: true,
    });
    const coreMesh = new THREE.Mesh(coreGeo, coreMat);
    heroGroup.add(coreMesh);

    // 3. ORBITAL RINGS (Precision gyroscopic safety metaphor)
    const ringGroup = new THREE.Group();
    const ringGeo1 = new THREE.TorusGeometry(2.7, 0.018, 16, isMobile ? 48 : 80);
    const ringMat1 = new THREE.MeshBasicMaterial({
      color: 0x38bdf8,
      transparent: true,
      opacity: 0.6,
    });
    const ring1 = new THREE.Mesh(ringGeo1, ringMat1);
    ring1.rotation.x = Math.PI / 3;
    ringGroup.add(ring1);

    const ringGeo2 = new THREE.TorusGeometry(3.0, 0.014, 16, isMobile ? 48 : 80);
    const ringMat2 = new THREE.MeshBasicMaterial({
      color: 0x8b5cf6,
      transparent: true,
      opacity: 0.45,
    });
    const ring2 = new THREE.Mesh(ringGeo2, ringMat2);
    ring2.rotation.y = Math.PI / 4;
    ring2.rotation.x = -Math.PI / 6;
    ringGroup.add(ring2);

    heroGroup.add(ringGroup);

    // 4. FLOATING PARTICLES (Cinematic depth)
    const particleCount = isMobile ? 40 : 120;
    const particlePositions = new Float32Array(particleCount * 3);
    for (let i = 0; i < particleCount * 3; i += 3) {
      particlePositions[i] = (Math.random() - 0.5) * 14;
      particlePositions[i + 1] = (Math.random() - 0.5) * 10;
      particlePositions[i + 2] = (Math.random() - 0.5) * 8;
    }
    const particleGeo = new THREE.BufferGeometry();
    particleGeo.setAttribute(
      "position",
      new THREE.BufferAttribute(particlePositions, 3)
    );
    const particleMat = new THREE.PointsMaterial({
      color: 0x38bdf8,
      size: 0.04,
      transparent: true,
      opacity: 0.5,
      blending: THREE.AdditiveBlending,
    });
    const particles = new THREE.Points(particleGeo, particleMat);
    scene.add(particles);

    // LIGHTING
    const ambientLight = new THREE.AmbientLight(0x0c1938, 1.8);
    scene.add(ambientLight);

    const mainLight = new THREE.DirectionalLight(0x0066ff, 3.5);
    mainLight.position.set(5, 5, 5);
    scene.add(mainLight);

    const rimLight = new THREE.DirectionalLight(0x8b5cf6, 2.5);
    rimLight.position.set(-5, -3, -2);
    scene.add(rimLight);

    // Mouse tracking
    let targetMouseX = 0;
    let targetMouseY = 0;
    let currentMouseX = 0;
    let currentMouseY = 0;

    const onPointerMove = (e: MouseEvent) => {
      targetMouseX = (e.clientX / window.innerWidth - 0.5) * 2;
      targetMouseY = (e.clientY / window.innerHeight - 0.5) * 2;
    };

    // Scroll tracking
    let scrollProgress = 0;
    const onScroll = () => {
      const scrollY = window.scrollY || window.pageYOffset;
      const heroHeight = window.innerHeight;
      scrollProgress = Math.min(scrollY / heroHeight, 1.5);
    };

    window.addEventListener("mousemove", onPointerMove);
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", updateSize);

    // ANIMATION LOOP
    let animId: number;
    const clock = new THREE.Clock();

    const animate = () => {
      animId = requestAnimationFrame(animate);
      const elapsedTime = clock.getElapsedTime();

      // Smooth mouse lerp
      currentMouseX += (targetMouseX - currentMouseX) * 0.05;
      currentMouseY += (targetMouseY - currentMouseY) * 0.05;

      if (!prefersReducedMotion) {
        // Slow cinematic idle rotation
        heroGroup.rotation.y = elapsedTime * 0.2 + currentMouseX * 0.45;
        heroGroup.rotation.x =
          Math.sin(elapsedTime * 0.3) * 0.1 - currentMouseY * 0.35;

        // Inner core counter-rotation
        coreMesh.rotation.y = -elapsedTime * 0.4;
        coreMesh.rotation.z = elapsedTime * 0.25;

        // Orbit rings rotation
        ring1.rotation.z = elapsedTime * 0.18;
        ring2.rotation.y = -elapsedTime * 0.22;

        // Gentle floating
        heroGroup.position.y = Math.sin(elapsedTime * 0.8) * 0.12 - scrollProgress * 1.8;
        heroGroup.position.z = -scrollProgress * 2.2;
        heroGroup.rotation.z = scrollProgress * 0.4;

        // Slow particle drift
        particles.rotation.y = elapsedTime * 0.03;
      }

      renderer.render(scene, camera);
    };

    animate();

    return () => {
      cancelAnimationFrame(animId);
      window.removeEventListener("mousemove", onPointerMove);
      window.removeEventListener("scroll", onScroll);
      window.removeEventListener("resize", updateSize);
      renderer.dispose();
      prismGeo.dispose();
      prismMat.dispose();
      wireGeo.dispose();
      wireMat.dispose();
      coreGeo.dispose();
      coreMat.dispose();
      ringGeo1.dispose();
      ringMat1.dispose();
      ringGeo2.dispose();
      ringMat2.dispose();
      particleGeo.dispose();
      particleMat.dispose();
    };
  }, []);

  return (
    <div
      ref={containerRef}
      className="absolute inset-0 w-full h-full pointer-events-none select-none z-0 overflow-hidden"
      aria-hidden="true"
    >
      <canvas ref={canvasRef} className="w-full h-full block" />
      {/* Cinematic subtle vignette and bottom gradient fade */}
      <div className="absolute inset-0 bg-gradient-to-t from-background via-transparent to-background/40 pointer-events-none" />
      <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_center,transparent_40%,#030712_95%)] pointer-events-none" />
    </div>
  );
}
