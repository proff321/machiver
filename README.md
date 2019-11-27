# Machiver the Media Archiver

## Design Goal
This application is designed to make it easy to archive the media from your favorite capture device. The original design is intended to be used with a camera phone, but should work just as well with any device which can expose its media as a file structure.

## Contributing

### Testing
To run the tests for this project simply issue command `docker-compose run --rm test`.  This will create a container, run the tests, and then remove the container when done.  The command will output the test results using the testdox format.

If you prefer a different format, then append the correct PHPUnit argument to the aforementioned command.  For example, to use the teamcity format, the command would become `docker-compose run --rm test --teamcity`.
