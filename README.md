# 📊 WordPress Plugin – Post View Counter

This is a lightweight and simple WordPress plugin that tracks how many times a blog post has been viewed. It stores the count using WordPress post meta and displays it at the bottom of each post.

---

## ✨ Features

- ✅ Tracks post views on every visit
- ✅ Displays the count below post content
- ✅ Uses WordPress hooks: `add_action()`, `add_filter()`
- ✅ Stores views using post meta (`update_post_meta()`)

---

## 📁 Folder Structure

wp-post-view-counter/
├── post-view-counter.php
├── README.md
└── .gitignore

---

## 🚀 Installation

1. Clone/download this repo into:
wp-content/plugins/wp-post-view-counter/
2. Login to WordPress admin dashboard
3. Navigate to **Plugins → Installed Plugins**
4. Find **Post View Counter** → Click **Activate**

---

## 🔍 How It Works

- Detects single post views using `is_single()`
- Retrieves current count using `get_post_meta()`
- Increments and updates count using `update_post_meta()`
- Adds display using `the_content` filter

---

## 🧪 Example Output

At the bottom of your post, you'll see:
Views: 3

---

## 🔧 Core PHP Code

```php
function pvc_increment_post_views() {
    if (is_single()) {
        $post_id = get_the_ID();
        $views = get_post_meta($post_id, 'pvc_post_views', true);
        $views = $views ? $views + 1 : 1;
        update_post_meta($post_id, 'pvc_post_views', $views);
    }
}
add_action('wp_head', 'pvc_increment_post_views');

function pvc_display_post_views($content) {
    if (is_single()) {
        $views = get_post_meta(get_the_ID(), 'pvc_post_views', true);
        $content .= '<p><strong>Views: ' . intval($views) . '</strong></p>';
    }
    return $content;
}
add_filter('the_content', 'pvc_display_post_views');
👤 Author
Danish Khutel

Final Year B.Tech CSE 
GitHub: @kdanish7642
