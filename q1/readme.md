# Question #1

An app that finds the shortest word on each line of a given text file and outputs that word on a new line. Edit `input.txt` to your liking and run `./command input.txt` to start the app.

## Assumptions

1. Assumed that `./command input.txt` is strictly the only possible entry point to the app (as per the task).
2. Assumed that the app runs in a \*nix environment where shebangs `!#` can dictate the execution context (unlike Windows, at least by default, where specifying the execution context would require a different entry point, contradicting `Assumption #1`).
3. Assumed that PHP executable is available in `/usr/bin/php`.
4. Assumed that PHP `register_argc_argv` is enabled.
5. Assumed that the input file `input.txt` is located in the same directory as `command` script.
6. Assumed that words on each line are separated with a single space character.
