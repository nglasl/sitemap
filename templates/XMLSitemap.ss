<?xml version="1.0" encoding="UTF-8"?>

	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<% if Menu(1) %>
		<% loop Menu(1) %>
			<% if not ExcludeFromSitemap %>
				<url>
					<loc>$AbsoluteLink</loc>
					<lastmod>{$LastEdited.Format(Y-MM-dd)}T{$LastEdited.Format(HH:mm:ss)}+00:00</lastmod>
				</url>
				<% if Children %>
					<% include XMLSitemapNextLevel %>
				<% end_if %>
			<% end_if %>
		<% end_loop %>
	<% end_if %>
	
	</urlset>