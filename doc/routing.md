# URL Routing

| Pattern                                     | Description                |
|---------------------------------------------|----------------------------|
| /                                           | Homepage                   |
| /{locale}                                   | Homepage                   |
| /admin                                      | Administrator dashboard  |
| /admin/###                                  | Administrator features   |
| /{locale}/login                             | [GET] Login, [POST]  Login script |
| /{locale}/logout                            | [POST] Logout script |
| /{locale}/forget_password                   | [POST] Initiate forget password |
| /{locale}/register                          | [POST] Register new user |
| /{locale}/reset_password                    | [GET] Reset password form [POST] Reset password script |
| /{locale}/{slug}                            | (1) if found in `bnn_slugs` table, it is either blog or page, (2) otherwise, it finds the page of the same name in `Views/` folder, (3) if nothing is found, `404` error. |
| /{locale}/tags/{blog_slug}/{tag}            | List all posts with this tag in the `blog_slug` |
| /{locale}/categories/{blog_slug}/{category} | List all posts under this category in the `blog_slug` |
| /{locale}/blog/{blog_slug}/{post_slug}      | Post under the blog |
| /{locale}/blog/{blog_slug}                  | * Same as `/{locale}/{slug}` if the `{slug}` part is the blog slug |

## Reserved slugs

* `assets` for assets files
* `plugins` for plugin files
* `contact` and `contact-us` for contact page

