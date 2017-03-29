<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/


namespace pocketmine\item;


class Axe extends TieredTool{

	public function getToolType() : int{
		return TieredTool::TYPE_AXE;
	}

	public function isAxe(){
		return $this->tier;
	}

	protected static function fromJsonTypeData(array $data){
		$properties = $data["properties"] ?? [];
		if(!isset($properties["durability"]) or !isset($properties["tier"]) or !isset($properties["attack_damage"])){
			throw new \RuntimeException("Missing Axe properties from supplied data for " . $data["fallback_name"]);
		}

		return new Axe(
			$data["id"],
			$data["meta"] ?? 0,
			1,
			$data["fallback_name"],
			TieredTool::toolTierFromString($properties["tier"]),
			$properties["durability"],
			$properties["attack_damage"] ?? 1
		);
	}
}