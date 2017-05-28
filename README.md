# mailgun-php-email-validator

# Mailgun V3 API email validation functions for PHP

# Please make sure to use your Email Validation Key which can be found by logging in to your Mailgun account and navigating to the following URL https://app.mailgun.com/app/account/security


Calls the Mailgun V3 API and parses a single E-Mail Address for validation

```
validateEmail($apiPublicKey, $emailAddress) 
```

Sample JSON response

```
{  
   "address":"yourusername@example.com",
   "did_you_mean":null,
   "is_valid":true,
   "parts":{  
      "display_name":null,
      "domain":"example.com",
      "local_part":"yourusername"
   }
}
```

Calls the Mailgun V3 API and parses multiple E-Mail Address for validation

```
validateEmails($apiPublicKey, $emailAddressArray) 
```

Sample JSON response 

```
{  
   "parsed":[  
      "yourusername@example.com",
      "yourusername2@example.com"
   ],
   "unparseable":[  

   ]
}
```