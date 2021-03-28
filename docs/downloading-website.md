**[↤ Developer Overview](../README.md)**

Downloading Website
===

You can download this Website using the code below ( this assumes you have [SSH integrated with Github](https://help.github.com/articles/adding-a-new-ssh-key-to-your-github-account/) ):

```bash
git clone git@github.com:campaignzero/police-scorecard.git .
```

Setup Environment
---

```bash
cp .env.example .env
```

Use your favorite text editor and set the following values in `.env` to whatever you need:

```
APP_ENV=local
APP_DEBUG=true

# If you are using Docker, use your Dev Machines IP Address with port 8000
# ( e.g. http://192.168.1.123:8000 and NOT: `http://localhost:8000` or `http://127.0.0.1:8000` )
APP_URL="http://192.168.1.123:8000"

# Ask a Project Admin for These Values
MAPBOX_TOKEN="pk.eyxxxxxxxxxxxxxxxxxxxxx"
STAY_WOKE_API_BASE="http://192.168.1.123:5000"
STAY_WOKE_API_KEY="A1B2C3D4-A1B2-C3D4-E5F6-A1B2C3D4E5F6"

# If you need the Admin Route, set this to whatever you want
STAY_WOKE_ADMIN_AUTH_USER=""
STAY_WOKE_ADMIN_AUTH_PASS=""
```

Setup Folder Permissions
---

```bash
chmod -R o+w bootstrap/cache
chmod -R o+w storage
```
