<?php
// 綜合範例 表單元件顯示輔助類別
class FormHelper
{
	public function __construct($values = array())
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->values = $_POST;
		} else {
			$this->values = $values;
		}
	}

	public function input($type, $attributes = array(), $isMutiple = false)
	{
		// 生成 <input> HTML 
		$attributes['type'] = $type;
		if (($type == 'radio') || ($type == 'checkbox')) {
			if ($this->isOptionSelected($attributes['name'] ?? null, $attributes['value'] ?? null)) {
				$attributes['checked'] = true;
			}
		}
		return $this->tag('input', $attributes, $isMutiple);
	}

	public function select($options, $attributes = array())
	{
		// 生成 <select> HTML 
		$multiple = $attributes['mutiple'] ?? false;
		return
			$this->start('select', $attributes, $multiple) .
			$this->options($attributes['name'] ?? null, $options) .
			$this->end('select');
	}

	public function textarea($attributes = array())
	{
		// 生成 <textarea> HTML 
		$name = $attributes['name'] ?? null;
		$value = $this->values[$name] ?? '';
		return $this->start('textarea', $attributes) . htmlentities($value) . $this->end('textarea');
	}

	public function tag($tag, $attributes = array(), $isMutiple = false)
	{
		// 生成完整的 HTML標籤Ｆ
		return "<$tag {$this->attributes($attributes,$isMultiple = false)} />";
	}

	public function start($tag, $attributes = array(), $isMultiple = false)
	{
		// 生成元件 HTML開頭標籤
		// <select> 與 <textarea> 標籤沒有value 屬性
		$valueAttribute = (!($tag == 'select') || ($tag == 'textarea'));
		$attrs = $this->attributes($attributes, $isMultiple, $valueAttribute);
		return "<$tag $attrs>";
	}

	public function end($tag)
	{
		// 生成元件 HTML結束符號
		return "</$tag>";
	}

	protected function attributes($attributes, $isMultiple, $valueAttribute = true)
	{
		// 格式化屬性值，使這些值可以適當的放入HTML標籤
		$tmp = array();
		// 如果標籤有 value attribute 而且有name並存在於values陣列中
		// 就設定 value attribute
		if ($valueAttribute && isset($attributes['name']) && array_key_exists($attributes['name'], $this->values)) {
			$attributes['value'] = $this->values[$attributes['name']];
		}
		foreach ($attributes as $k => $v) {

			if (is_bool($v)) {
				// 如果是布林值的話 表示是布林屬性
				if ($v) {
					$tmp[] = $this->encode($k);
				}
			} else {
				// 否則是 鍵=值型態
				$value = $this->encode($v);
				// 如果元件有多個值
				// 把[]加到值後面
				if ($isMultiple && ($k == 'name')) {
					$value .= '[]';
				}
				$tmp[] = "$k=\"$value\"";
			}
		}
		return implode(' ', $tmp);
	}

	protected function options($name, $options)
	{
		// 處理 <select> 選單的 <option> 標籤
		$tmp = array();
		foreach ($options as $k => $v) {
			$s = "<option value=\"{$this->encode($k)}\"";
			if ($this->isOptionSelected($name, $k)) {
				$s .= ' selected';
			}
			$s .= ">{$this->encode($v)}</option>";
			$tmp[] = $s;
		}
		return implode(' ', $tmp);
	}

	protected function isOptionSelected($name, $value)
	{
		// 如果 $name 不在 values 陣列中
		// 選項就不會被選取
		if (!isset($this->values[$name])) {
			return false;
		} else if (is_array($this->values[$name])) {
			// 如果 $name 元素是個陣列
			// 那檢查一下 $value 有沒有在這個陣列中
			return in_array($value, $this->values[$name]);
		} else {
			// 否則的話 將 $value 與 $name 元素作比較
			// 回傳是否存在
			return $value == $this->values[$name];
		}
	}

	public function encode($s)
	{
		// 進行編碼 避免跨站腳本攻擊
		return htmlentities($s);
	}
}
