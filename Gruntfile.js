/* vim: set ft=javascript expandtab shiftwidth=2 tabstop=2: */

module.exports = function( grunt ) {

  // Project configuration
  grunt.initConfig( {
    pkg:  grunt.file.readJSON( 'package.json' ),
    uglify: {
      all: {
        files: {
          'js/simple-map.min.js': [
            'node_modules/gmaps/gmaps.js',
            'js/simple-map.js'
          ]
        },
        options: {
          banner: '/**\n' +
            ' * <%= pkg.title %> - v<%= pkg.version %>\n' +
            ' *\n' +
            ' * <%= pkg.homepage %>\n' +
            ' * <%= pkg.repository.url %>\n' +
            ' *\n' +
            ' * Special thanks!\n' +
            ' * http://hpneo.github.io/gmaps/\n' +
            ' *\n' +
            ' * Copyright <%= grunt.template.today("yyyy") %>, <%= pkg.author.name %> (<%= pkg.author.url %>)\n' +
            ' * Released under the <%= pkg.license %>\n' +
            ' */\n',
            compress: {
              drop_console: true
            }
        }
      }
    },
    qunit: {
      all: {
        options: {
          timeout: 5000,
          urls: [ 'http://localhost:8080/tests/qunit/simple-map-test.html' ],
          page : {
            viewportSize : { width: 1280, height: 800 }
          }
        }
      }
    },
    connect: {
      server: {
        options: {
          port: 8080,
          base: '.'
        }
      }
    }
  } );

  // Load other tasks
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-connect');
  grunt.loadNpmTasks('grunt-contrib-qunit');

  grunt.registerTask( 'test', ['uglify', 'connect','qunit'] );
  grunt.registerTask( 'default', ['uglify'] );

  grunt.util.linefeed = '\n';
};
