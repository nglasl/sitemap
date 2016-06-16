<% loop Children %>
	<% if not ExcludeFromSitemap %>
		<url>
			<loc>$AbsoluteLink</loc>
			<lastmod>$LastEdited</lastmod>
		</url>
		<% if Children %>
			<% include XMLSitemapNextLevel %>
		<% end_if %>
	<% end_if %>
<% end_loop %>