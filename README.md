## Theme for Typecho.

![preView](./screenshot.png)

![](https://img.shields.io/badge/Theme-%40Typecho-brightgreen.svg)
[![Author](https://img.shields.io/badge/Author-me-brightgreen.svg)](https://runtua.cn.com)
![npm](https://img.shields.io/npm/l/express.svg)

极简主题，专注于创作。

ui from **[ikirby](https://ikirby.me/)**

# 目录

- [注意事项](#注意事项)
- [使用技巧](#使用技巧)
- [主题设置](#主题设置)
- [License](#License)

## 注意事项

- `typecho` 自定义字段不支持 `php7+`，所以浏览量无法生效。
- **需要关闭反垃圾保护**，不然会导致无法评论。

## 使用方法

1.  Clone or download.
2.  上传本主题，并放置在 `usr/themes/` 目录下。
3.  在 `Typecho` 后台，主题设置应用即可 ~
4.  主题设置勾选必选项并填入相关信息。/滑稽。

## 使用技巧

`isMobile()`：判断设备是手机/电脑；  
`ribbons()`：彩带函数；  
你可以这样做  
后台勾选 彩带 的情况下，仅手机显示彩带  
自定义 Js 放在 footer.php 下

```javascript
isMobile() && ribbons();
```

## 主题设置

### 网站图标

- 主题设置填入 `ico` 链接地址。( 建议为 `ico` 格式)

### 个人链接

- 主题设置内填入完整链接地址。

### 友链

- 新建独立页面，标题自拟，如`友链`，内容参照以下格式。

```markdown
# 无图友链

- [Google](https://Google.com)

# 带图友链，[] 内必须为 friend

- ![friend](https://avatars0.githubusercontent.com/u/34017352?s=400&u=a06f4ca3cebd399527f469c9ce1c9d5486b0a406&v=4)[Godme: 无非是一个不可知的背负](https://www.runtua.cn)
```

### Pjax

- **需要关闭反垃圾保护**，不然会导致无法评论。
- 设置 -> 评论 -> 取消勾选反垃圾保护。

### 可选功能

#### 社交链接

- 主题设置 => 填入完整 url

#### 背景图

- 主题设置 => 填入完整 url

#### 一言

- [Hitokoto - 一言](https://hitokoto.cn/)

#### 代码高亮

[Prism](http://prismjs.com)：prism.js tomorrow night eighties for JavaScript, CoffeeScript, CSS and HTML

#### 类彩带

- 手机端默认不显示

#### 站龄

- 格式如下：

- 2017/11/02 11:31:29

#### 归档

1.  创建独立页面。
2.  选择自定义模板 `Recent`，标题自拟，`Recent / 归档`。
3.  发布。

## License

![npm](https://img.shields.io/npm/l/express.svg)
