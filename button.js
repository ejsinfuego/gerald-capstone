const button = document.querySelector('.button');

gsap.to(button, {
    keyframes: [
        {
            '--text-opacity': 0,
            '--border-radius': 0,
            '--left-wing-background': 'var(--primary-darkest)',
            duration: 0.1
        },
        {
            '--left-wing-background': 'var(--primary)',
            '--right-wing-background': 'var(--primary)',
            duration: 0.1
        },
        {
            '--left-body-background': 'var(--primary-dark)',
            '--right-body-background': 'var(--primary-darkest)',
            duration: 0.4
        }
    ]
});
