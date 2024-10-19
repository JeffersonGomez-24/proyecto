<label for="title">Title</label>
<input type="text" id="title" name="title" value="<?= old("title", esc($article->title)) ?>">

<label for="content">Content</laberl>
<textarea id="content" name="content"><?= old("content", esc($article->content)) ?></textarea>

<button>Save</button>