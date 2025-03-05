module.exports = function (grunt) {
    const sass = require('sass'); // Importa Dart Sass

    grunt.initConfig({
        sass: {
            dev: {
                options: {
                    implementation: sass, // Usa Dart Sass
                    sourceMap: true
                },
                files: {
                    'style.css': 'sass/style.scss',
                    'responsive.css': 'sass/responsive.scss'
                }
            },
            dist: {
                options: {
                    implementation: sass,
                    sourceMap: false
                },
                files: {
                    'style.css': 'sass/style.scss',
                    'responsive.css': 'sass/responsive.scss'
                }
            }
        },
        uglify: {
            my_target: {
                files: {
                    'js/navigation.min.js': 'js/navigation.js',
                    'js/skip-link-focus-fix.min.js': 'js/skip-link-focus-fix.js',
                    'js/theme.min.js': 'js/theme.js',
                    'inc/customizer/customizer-controls.min.js': 'inc/customizer/customizer-controls.js',
                    'inc/customizer/customizer.min.js': 'inc/customizer/customizer.js',
                    'inc/customizer/custom-controls/spacing-control.min.js': 'inc/customizer/custom-controls/spacing-control.js',
                    'inc/customizer/custom-controls/font-selector-assets/js/select.min.js': 'inc/customizer/custom-controls/font-selector-assets/js/select.js'
                }
            }
        },
        watch: {
            css: {
                files: ['sass/**/*.scss'],
                tasks: ['sass:dev'],
                options: {
                    livereload: true
                }
            }
        }
    });

    // Carica i moduli Grunt
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Registra i task
    grunt.registerTask('default', ['sass:dev', 'uglify']);
    grunt.registerTask('dist', ['sass:dist', 'uglify']);
};
