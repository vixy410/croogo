<?php

echo $this->Html->css('admin');
echo $this->Html->script('jquery/jquery.min');

?>
<script>
$(function() {
	$('#nodes-for-links a').click(function() {
		parent.$('#LinkLink').val($(this).attr('rel'));
		parent.tb_remove();
		return false;
	});
});
</script>
<div class="row-fluid">
	<div class="span12">
	<?php
		echo __('Sort by:');
		echo ' ' . $this->Paginator->sort('id', __('Id'), array('class' => 'sort'));
		echo ', ' . $this->Paginator->sort('title', __('Title'), array('class' => 'sort'));
		echo ', ' . $this->Paginator->sort('created', __('Created'), array('class' => 'sort'));
	?>
	</div>
</div>

<div class="row-fluid">
	<?php
		echo $this->element('Nodes.admin/nodes_filter', array('url' => $this->here));
	?>

	<hr />

	<ul id="nodes-for-links">
	<?php foreach ($nodes as $node) { ?>
		<li>
		<?php
			echo $this->Html->link($node['Node']['title'], array(
				'admin' => false,
				'plugin' => 'nodes',
				'controller' => 'nodes',
				'action' => 'view',
				'type' => $node['Node']['type'],
				'slug' => $node['Node']['slug'],
			), array(
				'rel' => sprintf(
					'plugin:%s/controller:%s/action:%s/type:%s/slug:%s',
					'nodes',
					'nodes',
					'view',
					$node['Node']['type'],
					$node['Node']['slug']
					),
			));
		?>
		</li>
	<?php } ?>
	</ul>
	<div class="pagination"><ul><?php echo $this->Paginator->numbers(); ?></ul></div>
</div>