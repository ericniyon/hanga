module.exports = {
    // mode: 'jit',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
    ],
    purge: {
        content: [
            "./resources/**/*.blade.php",
            "./resources/**/*.js",
            "./resources/**/*.vue",
        ],
        options: {
            safelist: []
        }

    },
    corePlugins: {
        preflight: false,
    },
    prefix: 'tw-',
    important: true,
    theme: {
        extend: {},
    },
    plugins: [],
};
