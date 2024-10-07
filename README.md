# Lab week 2

## Part 0 - Install the webenvironment

Download the source files from `https://gitlab.ti.howest.be/ti/2024-2025/s3/web-security-and-honeypot/lab-2`

Now make sure that the webenvironment is accessible from you host.

### Labfiles on your VM
There are three options that you can use to transfer the lab files onto your machine:
  1. Use SSH with the option `-oForwardAgent=yes`
  2. Upload the SSH key of your VM to GitLab
  3. Download the files on your host and transfer them using `scp`


## Before you start
By default, the application will not work correctly.

Take a look closer look at the NGINX log file (*/var/log/nginx*).

## Part 1 - Web application security

There are three different web application attacks possible on the environment, fix them.

These attacks can be found inside the application:
* IDOR
* SQLi
* (Reflected) XSS

## Part 2 - Web server security

Configure your NGINX web server so that the following criteria are met:

* Disable NGINX version printing
* Only allow `GET` and `POST` HTTP methods
* Enable SSL (use your certificates from Lab1)
* Enable HTTP2
* Set following security headers
  * XFO - deny
  * XCTO - nosniff
  * HSTS
    - max-age: 2 days
    -  incude sub domains