/* vim: set ft=javascript expandtab shiftwidth=2 tabstop=2: */

module.exports = function( grunt ) {

  // Project configuration
  grunt.initConfig( {
    pkg:  grunt.file.readJSON( 'package.json' ),
    uglify: {
      all: {
        files: {
          'js/simple-map.min.js': [
            'js/gmaps.js',
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
            ' * Copyright <%= grunt.template.today("yyyy") %>, <%= pkg.author.name %> (<%= pkg.author.url %>)\n' +
            ' * Released under the <%= pkg.license %>\n' +
            ' */\n',
          mangle: {
            except: ['jQuery']
          }
        }
      }
    }
  } );

  // Load other tasks
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.registerTask( 'default', ['uglify'] );

  grunt.util.linefeed = '\n';
};
