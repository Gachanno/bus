'use strict';

const searchPointer = document.querySelector('.quick-search');
const searchButton = document.querySelector('.search-button');

const quickSearch = document.querySelector('.quick-searcher');
const defaultSearch = document.querySelector('.search-default');

const slides = document.querySelectorAll('.slide');


searchPointer.addEventListener('click', () => {
    if(quickSearch.style.opacity === '1'){
        quickSearch.style.opacity = '0';
    } else {
        quickSearch.style.opacity = '1';
    }
});

searchButton.addEventListener('click', (e) => {
    e.preventDefault();
    if (defaultSearch.style.opacity === '1') {
        defaultSearch.style.opacity = '0';
    } else {
        defaultSearch.style.opacity = '1';
    }
});


document.querySelector('.quick-search').addEventListener('click', () => {
    const arrow = document.querySelector('.arrow-search');
    arrow.classList.toggle('rotated');  
});


// слайдер

const slider = (index) => {
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
    });
};


