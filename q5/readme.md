# Question #5

Unfortunately, the question is too vague to form a decent requirements specification. The natural first step was to request some additional information but none was provided. Normally, it would be a bit of a dead end but, in the spirit of exercise, let's make some (hopefully reasonable) assumptions and build something :)

## Assumptions

1. The manual consists of individual HTML pages, each describing a unique (and totally imaginary) CLI command such as `create`, `read`, `update`, `delete`, etc.
2. Pages of the manual may be arranged into an arbitrary herarchy of directories.
3. Person mentions can occur anywhere within a page and are prefixed with `@` symbol, e.g. `@Kernighan` or `@JohnDoe`.
4. Mentions are case-insensitive.
5. The script is server-side rather than client-side.

## Implementation

It's fairly easy to recursively traverse the target directory for individual manual pages, but we already have a filesystem solution from `Question #2` that can do just that so it'd be more efficient and fun to reuse that. The `manual` directory provides a set of test manual pages. The entry point to the application is:

`php app.php`

The application will prompt the user for person's name to search for and will output filenames of pages that contain a @mention of that person. For example, entering person's name `Kernighan` will produce the following output:

    Search the manual for mentions of @Kernighan
    Found @Kernighan in version.html
    Found @Kernighan in create.html
    Found @Kernighan in delete.html
    Found @Kernighan in read.html
