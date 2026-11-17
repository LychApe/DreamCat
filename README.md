# DreamCat

QQ交流群: `1034830519`  
祝您使用愉快:-)

| 版本                                                                        |                  维护状态 |    最近更新时间    |    版本诞生时间    |
|---------------------------------------------------------------------------|----------------------:|:------------:|:------------:|
| [`DreamCat 3.x`](https://github.com/LychApe/DreamCat/tree/InsiderPreview) |          **Official** | 4 Oct  2026  | 6 Jul  2022  |
| [`DreamCat 2.x`](https://github.com/LychApe/DreamCat/tree/2.x_LTS)        | **Long Time Support** | 1 Aug  2023  | 13 Jul  2021 |
| `DreamCat 1.x`                                                            |       **End of Life** | 18 Feb 2021  | 15 Feb  2019 |

## 环境兼容

`DreamCat 3.x` 已在 `Typecho 1.3.0` + `PHP 8.4` (nginx / SQLite) 环境下完成全模板回归:首页、文章、独立页面、自定义模板页(友链)、分类/标签/作者归档、搜索、404 与 Feed 均正常,后台主题配置中心正常,无 PHP 弃用警告。

主题代码基线为 **PHP 8.0+**(使用了 `match`、箭头函数等语法),请搭配 PHP 8.0 及以上版本运行。

### 推荐服务端配置

主题自身资源已做 minify,但**压缩与缓存属于服务端职责**——未开启 gzip 时首屏资源体积约为开启后的 3 倍。推荐 nginx 配置:

```nginx
# http 块: 文本资源压缩 (woff2 字体本身已压缩, 无需加入)
gzip on;
gzip_vary on;
gzip_comp_level 5;
gzip_min_length 256;
gzip_types text/plain text/css text/javascript application/javascript application/json application/xml image/svg+xml;

# server 块: 静态资源缓存
location ~* \.(css|js|png|jpg|jpeg|svg|woff2?|ttf|eot|map)$ {
    expires 7d;
    add_header Cache-Control "public";
}
```

开启后本主题首页资源传输体积约 **270 KB**(未开启约 850 KB)。

### 图标字体子集维护

`MaterialIcons-Regular.woff2` 是按需子集(仅含主题使用的 25 个图标, 约 2 KB; 原始全量 43 KB)。**新增图标后需重新生成**, 否则新图标会显示为文字:

```bash
pip install fonttools brotli
# 1. 从模板/JS 提取用到的图标名, 与官方清单比对:
#    https://github.com/google/material-design-icons/blob/master/font/MaterialIcons-Regular.codepoints
# 2. 在 GSUB 中删除非目标连字, 再按字形裁剪 (连字字体必须先删规则再裁字形):
python3 - <<'PY'
from fontTools.ttLib import TTFont
f = TTFont('DreamCat_StaticResources/icons/material-icons/MaterialIcons-Regular.woff2')
# 换用全量字体: git show HEAD~1:... 或重新下载, 以下 names 换成实际图标列表
names = ['menu', 'search']  # ← 所有用到的图标
codepoints = {l.split()[0]: int(l.split()[1], 16)
              for l in open('codepoints.txt')}  # 官方 codepoints 清单
cmap = f.getBestCmap()
keep = {cmap[codepoints[n]] for n in names}
for lookup in f['GSUB'].table.LookupList.Lookup:
    if lookup.LookupType != 4: continue
    for st in lookup.SubTable:
        for first in list(st.ligatures):
            kept = [l for l in st.ligatures[first] if l.LigGlyph in keep]
            st.ligatures[first] = kept if kept else None
            if not kept: del st.ligatures[first]
f.save('/tmp/pruned.ttf')
PY
python3 -m fontTools.subset /tmp/pruned.ttf \
  --glyphs-file=glyphs.txt --flavor=woff2 --layout-features=liga,ccmp --no-hinting \
  --output-file=DreamCat_StaticResources/icons/material-icons/MaterialIcons-Regular.woff2
# glyphs.txt 内容: 26 个字母 + 下划线的字形名(经 cmap 反查) + 25 个图标字形名
```

## 鸣谢

`JetBrains` 提供了轻便的字体(Jetbrains Mono)。   
`Fallsoft` 提供了高速的静态资源加速。

## 安装(Install)

> ### 开发版本（最新）
> 1. 建议使用`git clone`以动态获取后续版本
> 2. 放入`Typecho`的`usr`目录下`themes`文件夹中
> 3. 请确保本主题文件夹名为`DreamCat`
> 4. 在`Typecho 管理页面`->`网站外观`启用以完成安装

> master [ ( 3.x ) ( 公测 ) ] :  
> ` git clone -b master https://github.com/LychApe/DreamCat.git `
>
> 2.x_LTS [ ( 2.x ) ( LTS ) ] :  
> ` git clone -b 2.x_LTS https://github.com/LychApe/DreamCat.git `

> ### 稳定版本
> 1. 请点击[`Releases`](https://github.com/LychApe/DreamCat/releases)下载稳定版本
> 2. 完全解压并放入`Typecho`的`usr`目录下`themes`文件夹中
> 3. 请确保本主题文件夹名为`DreamCat`
> 4. 在`Typecho 管理页面`->`网站外观`启用以完成安装

## 更新日志

### 最新版本

> ### DreamCat 3.0.261004  [`下载`](https://github.com/CornWorld/DreamCat/archive/refs/tags/3.0.261004.zip)
> 1. `适配` Typecho 1.3.0 + PHP 8.4 全模板回归(首页/文章/页面/归档/搜索/404/Feed/后台配置中心)
> 2. `修复` 文章页"上一篇/下一篇"链接地址缺失(全 PHP 版本)
> 3. `修复` PHP 8 下存在相邻文章时文章页 TypeError
> 4. `修复` 评论"取消回复"按钮失效
> 5. `新增` 站点 favicon
> 6. `升级` highlight.js 11.12.0 / smooth-scroll 16.1.3, 改用 `highlightAll()`
> 7. `变更` 代码现代化, 语法基线提升至 PHP 8.0+ 与 ES2020

> ### DreamCat 3.0.260502  [`下载`](https://github.com/LychApe/DreamCat/archive/refs/tags/3.0.260502.zip)
> 1. `优化` DreamCat 主题配置中心布局和样式
> 2. `优化` functions.php 重复逻辑
> 3. `移除` 融合CDN加速模式
> 4. `新增` 前台主题色、强调色和夜间模式设置
> 5. `修复` 前台头部布局和侧边栏展开项背景异常

> ### DreamCat 2.10.230801_LTS  [`下载`](https://github.com/LychApe/DreamCat/archive/refs/tags/2.10.230801_LTS.zip)
> 1.优化文章页排版  
> 2.优化代码结构  
> 3.去除冗余代码  
> 4.更换CDN链接  
> 5.优化字体库
  
------

### 更多

**详细更新日志前往UpdateLog.md文件浏览**

## Github Star 趋势

[![Star History Chart](https://api.star-history.com/svg?repos=LychApe/DreamCat&type=Date)](https://star-history.com/#LychApe/DreamCat&Date)

## 版权信息

### GPLv3

由 `LychApe`(`荔猿`) 维护的 `DreamCat` 仓库及其附属存储库默认遵循`GPLv3`协议开源发布  
下面简述由`GPLv3`带来的约束条款( 本处解释若无特别说明无 法律效益, 仅仅帮助了解协议大体内容, `GPLv3`
最终解释权应当归属`自由软件基金会` )

1. 如果您不进行分发, 您能可以无限制的复制与运行本项目
2. 您可以无限制的分发本项目原本的源码(包括但不限于`收费`)
3. 所有继承本项目的衍生作品(包括但不限于`Fork`)必须遵循`GPLv3`, 并含有醒目修改声明与本项目的原版权声明

### 附加条款

> 此附加条款符合`GPLv3`协议并具有法律效益

1. 我们不允许歪曲代码的来源, 对于代码的所有修改, 要以合理形式标示出和原版的区别
2. 我们不允许您使用我们的名号, 进行包括但不限于`宣传` `销售`的行为
3. 我们要求页面中必须出现带有完整原版权声明的按钮, 并放置在醒目的位置
4. 您使用本项目造成的各种问题 纠纷, 我们皆不负责

### 更多

只要你遵循上述条款规定，您就可以自由使用并传播本源代码  
Copyright © 2015-2024 by LychApe

## 主题开发:

- [HanFengA7](https://github.com/HanFengA7)
- [TeddyNight](https://github.com/TeddyNight)
- [Dev-Leo](https://github.com/Dev-Leo)
- [CornWorld](https://github.com/CornWorld)
- [WhiteBearcn](https://github.com/whitebearcn)
- [huanhuan](https://huanblog.com)
