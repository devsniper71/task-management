# Task Management App

## Project Installation and Setup

> #### STEP 01: Project clone

```bash
git clone https://github.com/raselism71/task-management.git
```

> #### STEP 02: Project browse

```bash
cd task-management
```

> #### STEP 03: Copy environment file

```bash
cp .env.example .env
```

> #### STEP 04: Package installation

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

> #### STEP 05: Build app

```bash
sail build --no-cache
```

> #### STEP 06: Project run

```bash
sail up -d
```

> #### Step 07: Generate the app key

```bash
sail artisan key:generate
```

> #### Step 08: Storage Link

```bash
sail artisan storage:link
```

> #### STEP 09: Run migration

```bash
sail artisan migrate
```

> #### STEP 10: Deploy project

```bash
http://localhost
```

> #### STEP 07: Project stop

```bash
sail down
```
