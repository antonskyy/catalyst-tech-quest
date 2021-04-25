# Question #2

Please note that the submitted code, although operational, is largely untested and best treated as pseudocode. The aim here is to demonstrate an OOD/P approach to completing the task rather than to ship a production-grade application with all the intricacies of a real-life filesystem.

## Overview & considerations

The design is based on the observation that nodes (i.e. directories and files) in a filesystem tree share certain properties and behaviours while, in some ways, do differ significantly.

For instance, both a file and a directory are identified by their paths. Similarly, both can be renamed/moved using identical instructions. On the other hand, operations such as deletion require different mechanisms.

Therefore, it made sense to separate the common properties and methods into the `Node` superclass and let the `File` and `Directory` subclasses inherit from it. In addition, certain operations such as `create()` and `delete()` should be applicable to both files and directories regardsless of the node type so those methods were made abstract in the supercalss in order to force the subclasses to implement their own versions of the methods.

A simple working example is included in `app.php` where the application outputs names of all nodes in the filesystem's node tree:

`php app.php`
