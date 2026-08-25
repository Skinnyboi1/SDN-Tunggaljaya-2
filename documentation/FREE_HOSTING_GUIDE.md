# Free Web Hosting Guide - SDN Tunggaljaya 2

Recommended platforms for hosting this Laravel project **100% Free** with setup steps for each option.

---

## 🏆 Option 1: Render.com (Recommended Free Cloud Platform)

[Render](https://render.com) offers **Free Web Services** with automated deployment directly from GitHub.

### Setup Steps:
1. Push your project repository to **GitHub**.
2. Sign up / Log in to [Render.com](https://render.com) using your GitHub account.
3. Click **New +** &rarr; **Web Service**.
4. Connect your GitHub repository (`Tunggaljaya`).
5. Select **Docker** as the Environment (it will automatically use the included `Dockerfile`).
6. Choose the **Free** instance plan.
7. Click **Create Web Service**. Render will automatically build and deploy your app with a free HTTPS URL (e.g., `https://sdn-tunggaljaya2.onrender.com`).

---

## ⚡ Option 2: Koyeb (Free PaaS)

[Koyeb](https://www.koyeb.com) provides a generous **Free Tier** for running containerized web applications.

### Setup Steps:
1. Push project code to GitHub.
2. Sign up on [Koyeb.com](https://www.koyeb.com).
3. Create a **New App** &rarr; Select **GitHub Deployment**.
4. Choose repository `Tunggaljaya`.
5. Select Docker deployment (Port `8000`).
6. Click **Deploy**. Your app will be live on a free SSL domain.

---

## 🌐 Option 3: InfinityFree (Traditional Free PHP Web Hosting)

[InfinityFree](https://www.infinityfree.com) provides traditional cPanel / LAMP hosting with **Free MySQL Database** and **Unlimited Bandwidth**.

### Setup Steps:
1. Sign up on [cx](https://www.infinityfree.com).
2. Create a free account (you will get a domain like `sdntunggaljaya2.infinityfreeapp.com`).
3. Open **cPanel** &rarr; **MySQL Databases** and create a new database.
4. Upload project files to the `htdocs` directory via File Manager / FTP.
5. Move contents of the `public/` folder to `htdocs/` and update `index.php` paths.
6. Configure `.env` with MySQL credentials provided in InfinityFree cPanel.

---

## 🚀 Summary Comparison

| Platform | Best For | Database | Setup Time | SSL Certificate |
| :--- | :--- | :--- | :--- | :--- |
| **Render.com** ⭐ | One-click Git Deploy | SQLite / Docker | 3 Minutes | Free Auto HTTPS |
| **Koyeb** | Docker Containers | SQLite | 3 Minutes | Free Auto HTTPS |
| **InfinityFree** | Traditional cPanel | MySQL Free | 10 Minutes | Free SSL |
