# Question #4

1. Generally speaking, enabling automatic system updates is the most certain way to ensure system security. However, unmonitored updates can introduce breaking changes and impair hosted applications. Therefore, a good balance would be to allow minor version updates to be carried out automatically and notify of major updates so that they can be tested prior to deployment. A good example of this is Plesk (and its security add-ons) which make it fairly easy to configure what gets installed automatically and what is deferred, and also can run a system backup prior to deploying updates.

2. Personally, I wouldn't let a customer anywhere near the application deployment process :) Seriously though, I would:

   1. Explore their deployment requirements in terms of build and test automation.
   2. Explore their existing version control and hosting infrastructure.
   3. Suggest a suitable deployment pipeline solution.

3. Static assets caching, access control (such as IP banning, user account brute force attack prevention), redirection.
