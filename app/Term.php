<?php

namespace App;

use App\Option;

use Corcel\Term as Corcel;

class Term extends Corcel
{
    protected $connection = 'wordpress';

    public function getTitle()
    {
    	$catArray  = unserialize(Option::where('option_name', 'qtranslate_term_name')->first()->option_value);


    	return $catArray[$this->name][\LaravelLocalization::getCurrentLocale()];
    }

    public function getDescription()
    {
        $term_taxonomy = \App\TermTaxonomy::where('term_id', $this->term_id)->where('taxonomy', 'category')->first();

        return Toolkit::getCurrentLangText($term_taxonomy->description);
    }

    public function getMenuParentID()
	{
		$meta = \App\PostMeta::where('meta_key', '_menu_item_object_id')->where('meta_value', $this->term_id)->first();

		return $meta == null ? -1 : $meta->post_id;
	}

    public function getSubItems()
    {
        $items = array();

        //$term_taxonomies = \App\TermTaxonomy::where('parent', $this->term_id)->where('taxonomy', 'category')->get();

        $term_taxonomies = \App\TermTaxonomy::join('terms', 'term_taxonomy.term_taxonomy_id', '=', 'terms.term_id')
                            ->orderby('term_order', 'asc')
                            ->where('parent', $this->term_id)->where('taxonomy', 'category')
                            ->get();
                            

        foreach ($term_taxonomies as $term) {
            $items[] = Term::find($term->term_id);
        }

        return $items;
    }
}