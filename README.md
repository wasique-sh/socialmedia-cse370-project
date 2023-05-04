# TextBook - Social Media Platform Project
---
# Features
- Feature 1:
    a. Users can register, log in and logout
    b. Users can see and update their profile
    c. Users can post status updates and normal posts
    d. Users session data is saved and used to deliver a better experience

- Feature 2:
    a. Users can send friend requests to other users
    b. Users see pending friend requests
    c. Users accept or cancel friend requests
    d. Users can see other’s profiles

- Feature 3:
    a. Users can see the posts from their friends on their newsfeed / Home page
    b. Users can like, dislike and share the posts of others depending on the privacy setting of the post
    c. Users can make comments on posts and comments can be liked or disliked

- Feature 4:
    a. Users can get notifications whenever their posts are liked, disliked, shared, or commented upon
    b. Users can get notifications whenever their comments and messages are liked, disliked upon
    c. Users can get notifications whenever they receive a message
    d. Users can dismiss notifications

- Feature 5:
    a. Users can chat with other users privately
    b. Users can see chat history
    c. Users can like-dislike messages/chat

---
# Basic Overview:
- start_page.php is the index / sign in page. Through signin.php an existing user can log in. Session Variables are used to keep track of user activity. User is then redirected to home_page.php.

- signup_page.php is the sign up page. A new user is registered through signup.php and is sent to me_page.php.

- me_page.php shows user details and how to update them and post status updates through update.php. User can also make Posts through posts.php.

- home_page.php shows ones and all friends posts in descending order. User can like, dislike, share or go to comments of that posts through interactposts.php.

- friends_page.php shows all friend request status in ascending FromUID and how to accept, reject or send friend requests through friendrequest.php. It also shows all users in ascending username and how to show their details or chat with them through useraction.php.

- message_page.php is the page directed from useraction.php. It shows the chat log in ascending order of time and how to chat with another user using message.php. Users can also like-dislike using interactmessage.php

- notifications_page.php shows all other users likes, dislikes, shares, comments, friend requests, messages notifications in descending order of time. Users can dismiss new notifications to old ones using dismiss.php.

- comments_page.php is directed from  interactposts.php. It shows all the comments of a post in ascending order of time and how to like/dislike comments through interactcomments.php and comment through comments.php

- user_page.php is directed from useraction.php. It shows other users details.

- logout.php is used to log out from a session of use. It redirects to start_page.php.

- about_page.php is about page of TextBook Social Media Platform

## Extra
- message_page.php, comments_page.php, user_page.php are hidden pages that can only be accessed through form inputs and depend on session variables

- About friend requests: Once a friend, always a friend. And once rejected, it never changes.

- There are only select, insertions and update queries. Delete queries are not used.

- About navigation: Go Backwards works most of the time. Refresh always works but best is clicking on respective tabs i.e. Home, Friends, Me, Notifications, TextBook, Log out.

- Website must begin with start_page.php or signup_page.php or logout.php. Otherwise it will break

---
# Deployment
- The "textbook" folder is to be placed in htdocs of xampp
- Open xampp and click ✅ on Apache and MySQL.
- textbook.sql which can be imported to a created Database called "textbook" through phpmyadmin
    - Go to php my admin
    - Create a new Database named “TextBook”
    - Select it and go to right panel and click on Import tab
    - Now  choose file from “textbook.sql” and click go
- Open start_page.php in Browser


