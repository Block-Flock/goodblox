local hasLoaded = false
function character()
local player = game.Workspace:FindFirstChild("{{ $username }}")
if player~=nil and hasLoaded == false then
wait(1)
player.Head.BrickColor = BrickColor.new("{{ $headcolor }}")
player.Torso.BrickColor = BrickColor.new("{{ $torsocolor }}")
player["Right Leg"].BrickColor = BrickColor.new("{{ $rightlegcolor }}")
player["Right Arm"].BrickColor = BrickColor.new("{{ $rightarmcolor }}")
player["Left Leg"].BrickColor = BrickColor.new("{{ $leftlegcolor }}")
player["Left Arm"].BrickColor = BrickColor.new("{{ $leftarmcolor }}")
{!! $facething !!}
{!! $shirtthing !!}
{!! $pantthing !!}
local TShirt = Instance.new("Decal")
TShirt.Parent = player.Torso
TShirt.Texture = "{{ $echothing }}"
{!! $hatthing !!}
{!! $hatthing2 !!}
{!! $hatthing3 !!}
player.Humanoid.Died:connect(function()
   if hasLoaded == true then
       wait(5)
       hasLoaded = false
   end
end)

hasLoaded = true
end
end
workspace.ChildAdded:connect(character)
