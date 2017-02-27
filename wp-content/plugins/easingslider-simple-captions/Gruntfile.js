module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		concat: {
			css: {
				files: {
					'assets/css/admin.css': [
						'resources/css/admin.css'
					],
					'assets/css/public.css': [
						'resources/css/public.css'
					]
				}
			},
			js: {
				files: {
					'assets/js/admin.js': [
						'resources/js/admin.js'
					],
					'assets/js/public.js': [
						'resources/js/public.js'
					]
				}
			}
		},
		cssmin: {
			main: {
				files: {
					'assets/css/admin.min.css': [
						'assets/css/admin.css'
					],
					'assets/css/public.min.css': [
						'assets/css/public.css'
					]
				}
			},
		},
		copy: {
			images: {
				files: [{
					expand: true,
					flatten: true,
					src: [
						'resources/images/*'
					],
					dest: 'assets/images'
				}]
			}
		},
		makepot: {
			target: {
				options: {
					include: [
						'includes/.*'
					],
					type: 'wp-plugin'
				}
			}
		},
		uglify: {
			main: {
				files: {
					'assets/js/admin.min.js': [
						'assets/js/admin.js'
					],
					'assets/js/public.min.js': [
						'assets/js/public.js'
					]
				}
			}
		},
		watch: {
			js: {
				files: [
					'resources/js/*.js'
				],
				tasks: ['js']
			},
			css: {
				files: [
					'resources/css/*.css'
				],
				tasks: ['css']
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-wp-i18n');

	grunt.registerTask('js',      ['concat:js', 'uglify:main']);
	grunt.registerTask('css',     ['concat:css', 'cssmin:main']);
	grunt.registerTask('default', ['makepot', 'css', 'js', 'copy']);
};
