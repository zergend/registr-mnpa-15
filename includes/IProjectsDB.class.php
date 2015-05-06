<?php
/**
 *	inerface IProjectsDB
 *	содержит основные методы для работы с Проектами
*/
interface IProjectsDB{
    
	/**
	 *	Добавление новой записи ПРОЕКТА МНПА
	 *	
	 *	@param string $name - название проекта
	 *	@param string $description - описание проекта
	 *	@param date $startDate - дата начала работы над проектом
	 *	@param date $startDate - дата начала работы над проектом
     *  @param string $status - статус проекта
     *
	 *	@return boolean - результат успех/ошибка
	*/
	function saveProjects($name, $description, $startDate, $endDate, $status);
	
    /**
	 *	Выборка всех записей
	 *	
	 *	@return array - результат выборки в виде массива
	*/
	function getProjects();
	
    /**
	 *	Удаление записи 
	 *	
	 *	@param integer $id - идентификатор удаляемой записи
	 *	
	 *	@return boolean - результат успех/ошибка
	*/
	function deleteProject($id);
}
?>