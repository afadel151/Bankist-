<template>
    <button
      :class="[
        'font-semibold rounded-lg flex items-center transition-all duration-200',
        variants[variant],
        sizes[size],
        className
      ]"
    >
      <slot></slot>
    </button>
  </template>
  
  <script setup>

  
  const props = defineProps( {
    variant: 'primary',
    size: 'md',
    className: ''
  })
  
  const variants = {
    primary: 'bg-green-600 hover:bg-green-700 text-white',
    secondary: 'bg-gray-800 hover:bg-gray-700 text-white border border-gray-700'
  }
  
  const sizes = {
    sm: 'px-4 py-2 text-sm',
    md: 'px-6 py-3 text-base',
    lg: 'px-8 py-4 text-lg'
  }

  </script>