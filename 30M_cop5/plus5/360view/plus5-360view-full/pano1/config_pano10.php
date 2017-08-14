<? $ex = explode('_',$_GET[w]); ?>
<Root xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"> 
	<System> 
		<versionType>Professional</versionType>
		<stageWidth><? echo $ex[0]; ?></stageWidth>
		<stageHeight><? echo $ex[1]; ?></stageHeight>
		<isAutoRun>true</isAutoRun>
		<runTo>Right</runTo>
		<sceneType>0</sceneType>
	</System> 
	<TWSceneViewer>
		<name>SceneViewer</name>
		<bgColor>255,213,223,233</bgColor>
		<lwBarBgColor>255,45,91,141</lwBarBgColor>
		<lwBarColor>255,130,170,215</lwBarColor>
		<lwBarBounds>350,246,200,8</lwBarBounds>
		<showLoadingPercent>true</showLoadingPercent>
		<progressType>1</progressType>
	</TWSceneViewer>
	<Scene>
		<className>SceneNode</className>
		<name>pano1</name>
		<SceneKind>Cylindrical</SceneKind>
		<pan>0</pan>
		<tilt>0</tilt>
		<fov>108</fov>
		<maxPan>180</maxPan>
		<minPan>-180</minPan>
		<maxTilt>27</maxTilt>
		<minTilt>-27</minTilt>
		<maxFov>270</maxFov>
		<minFov>54</minFov>
		<speed>3</speed>
		<path>scene/pano1.jpg</path>
		<hfov>360</hfov>
		<detailInfo>3999,674,3999</detailInfo>
	</Scene>
</Root>
