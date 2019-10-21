<?
/**
 * User class
 * Класс пользователя
 */
class User{
	public $userId   = "";
	public $userName = "";

	/**
	 * createArticle function, Функция создание статьи
	 *
	 * @param [string] $title, Заголовок статьи
	 * @param [string] $text, Текст статьи
	 * @return void
	 */
	public function createArticle($title,$text)
	{
		//Реализация метода
	}

	/**
	 * getAllArticles function, Функция получения всех записей текущего пользователя
	 *
	 * @return void
	 */
	public function getAllArticles()
	{
		//Реализация метода
	}

}

/**
 * Article class, класс Статей
 */
class Article
{
	public id       = "";
	public authorId = "";
	public title 	= "";
	public text  	= "";
	public date  	= "";

	/**
	 * getAuthor function, Функция получения автора текущей статьи
	 *
	 * @return integer
	 */
	public function getAuthor()
	{
		//Реализация метода
	}

}