Trying out Markdown
=================================

This is a sample file on how to use Markdown together with Anax. Review its source to get an understanding of how it works.



Linking to other pages {#url}
---------------------------------

I can link to another document. In the same directory like the file [license.md](license). Or in another directory like [report/kmom01](report/kmom01).

It does not matter in what subdirectory we are. All urls that are relative, will be prepended with the site base url. The base url will be the url to the [`htdocs`]() directory.

You can find a copy of this file in the subdirectory [`content/example/markdown.md`](example/markdown). Try it out to verify that all urls works the same way as in the [markdown](markdown) copy.



Linking to image sources {#img}
---------------------------------

Linking to image sources works in the same manner as linking to other pages. Anax will prepend the base url to all relative image sources.

Here are some samples on how you can link to a image using Markdown or HTML.

```text
![alt text](img/dbwebbisar.jpg)
<img src="img/dbwebbisar.jpg" alt="alt text">
```

This is the outcome of the two images.

![alt text](img/dbwebbisar.jpg)

<img src="img/dbwebbisar.jpg" alt="alt text">

So, all image sources are relative the htdocs directory.



Linking to assets/resources {#asset}
---------------------------------

What if I want to create a link to another asset, for example a php-page, a pdf-document or an image to be displayed in its own tab?

Well, two answers.

1. Use [friendly urls](dbwebb.se/anax/snygga-lankar) and continue to link relative links. The link will be prepended with the baseurl, but now without the part `index.php/`.

1. Tell Anax Flat to ignore the link and leave it as it is. You can do this by prepending the relative url with a `!`. Any link in a document in `content` having a relative link prepended with a `!` will be treated as a link to an asset, instead of a link to a page.

Here is an example of creating a relative link to a image.

```text
[View full size image](!img/dbwebbisar.jpg)
<a href="!img/dbwebbisar.jpg">
    <img src="img/dbwebbisar.jpg" alt="alt text">
</a>
```

[View full size image](!img/dbwebbisar.jpg)
<a href="!img/dbwebbisar.jpg">
    <img src="img/dbwebbisar.jpg" alt="alt text">
</a>



Creating a mailto: link {#mailto}
---------------------------------

You can create a mailto link using Markdown or HTML. It looks like this.

```text
<mailto:user@example.com>
<user@example.com>
<a href="mailto:user@example.com">user@example.com</a>
```

The resulting links looks like this.

* <mailto:user@example.com>
* <user@example.com>
* <a href="mailto:user@example.com">user@example.com</a>
