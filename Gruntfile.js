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
          banner: '/*! <%= pkg.title %> - v<%= pkg.version %>\n' +
            ' * <%= pkg.homepage %>\n' +
            ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
            ' * Licensed GPLv2+' +
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
