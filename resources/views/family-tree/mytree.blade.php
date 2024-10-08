@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Family Tree</div>
                <div class="card-body">
                    <div class="responsive">
                        <div id="family-tree"></div>
                        <script src="https://d3js.org/d3.v7.min.js"></script>
                        <style>
                            .node {
                                cursor: pointer;
                            }

                            .node rect {
                                fill: #fff;
                                stroke: steelblue;
                                stroke-width: 3px;
                            }

                            .node text {
                                font: 12px sans-serif;
                                pointer-events: none;
                                fill: #000;
                                /* Text color */
                            }

                            .link {
                                fill: none;
                                stroke: #ccc;
                                stroke-width: 2px;
                            }

                            .spouse-link {
                                stroke: pink;
                                stroke-dasharray: 5, 5;
                            }

                            .spouse-node rect {
                                fill: #fff;
                                stroke: steelblue;
                                stroke-width: 3px;
                            }

                            .spouse-node text {
                                font: 12px sans-serif;
                                fill: #000;
                                /* Text color for spouse */
                                pointer-events: none;
                            }
                        </style>
                        <svg width="960" height="600"></svg>
                        <script>
                            const data = {!!json_encode($familyTree) !!};
                            const margin = {
                                top: 20,
                                right: 120,
                                bottom: 20,
                                left: 120
                            };
                            const width = 960 - margin.right - margin.left;
                            const height = 600 - margin.top - margin.bottom;

                            const svg = d3.select("svg")
                                .attr("width", width + margin.right + margin.left)
                                .attr("height", height + margin.top + margin.bottom)
                                .append("g")
                                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

                            const root = d3.hierarchy(data);

                            const treeLayout = d3.tree().size([width, height]); // Switched width and height for vertical layout
                            treeLayout(root);

                            // Draw the links between nodes
                            const link = svg.selectAll(".link")
                                .data(root.links())
                                .enter().append("path")
                                .attr("class", "link")
                                .attr("d", d3.linkVertical() // Changed to d3.linkVertical for vertical orientation
                                    .x(d => d.x)
                                    .y(d => d.y));

                            // Draw the nodes
                            const node = svg.selectAll(".node")
                                .data(root.descendants())
                                .enter().append("g")
                                .attr("class", "node")
                                .attr("transform", d => `translate(${d.x},${d.y})`);

                            node.append("rect")
                                .attr("width", 120)
                                .attr("height", 30)
                                .attr("x", -60)
                                .attr("y", -15)
                                .attr("rx", 10) // rounded corners
                                .attr("ry", 10); // rounded corners

                            node.append("text")
                                .attr("dy", ".35em")
                                .attr("text-anchor", "middle")
                                .text(d => d.data.name);

                            // Draw spouse links
                            svg.selectAll(".spouse-link")
                                .data(root.descendants())
                                .enter()
                                .filter(d => d.data.spouse) // Only nodes with a spouse
                                .append("line")
                                .attr("class", "spouse-link")
                                .attr("x1", d => d.x)
                                .attr("y1", d => d.y)
                                .attr("x2", d => d.x + 160) // Adjust spacing as necessary
                                .attr("y2", d => d.y);

                            // Draw spouse nodes
                            const spouseNode = svg.selectAll(".spouse-node")
                                .data(root.descendants())
                                .enter()
                                .filter(d => d.data.spouse)
                                .append("g")
                                .attr("class", "spouse-node")
                                .attr("transform", d => `translate(${d.x + 160},${d.y})`); // Adjust spacing as necessary

                            spouseNode.append("rect")
                                .attr("width", 120)
                                .attr("height", 30)
                                .attr("x", -60)
                                .attr("y", -15)
                                .attr("rx", 10) // rounded corners
                                .attr("ry", 10); // rounded corners

                            spouseNode.append("text")
                                .attr("dy", ".35em")
                                .attr("text-anchor", "middle")
                                .text(d => d.data.spouse.name + (' (Wife)'));
                        </script>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection