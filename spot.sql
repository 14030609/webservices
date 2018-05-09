<?xml version="1.0" encoding="UTF-8" ?>
<project name="spot" id="Project_d3cc77" template="Default" database="PostgreSQL" >
	<schema name="public" catalogname="spot" schemaname="public" >
		<table name="contact" >
			<column name="id" type="integer" length="10" decimal="0" jt="4" mandatory="y" />
			<column name="name" type="varchar" length="100" decimal="0" jt="12" mandatory="y" />
			<column name="email" type="varchar" length="100" decimal="0" jt="12" mandatory="y" />
			<column name="phone" type="varchar" length="20" decimal="0" jt="12" mandatory="y" />
			<column name="message" type="text" decimal="0" jt="12" mandatory="y" />
			<index name="contact_pkey" unique="PRIMARY_KEY" >
				<column name="id" />
			</index>
		</table>
		<table name="employees" generator_rows="100" >
			<column name="id" type="integer" length="10" decimal="0" jt="4" mandatory="y" />
			<column name="emp_no" type="integer" length="10" decimal="0" jt="4" mandatory="y" />
			<column name="birth_date" type="date" length="13" decimal="0" jt="91" mandatory="y" >
				<comment><![CDATA[(DC2Type:date_immutable)]]></comment>
			</column>
			<column name="first_name" type="varchar" length="100" decimal="0" jt="12" mandatory="y" />
			<column name="last_name" type="varchar" length="100" decimal="0" jt="12" mandatory="y" />
			<column name="gender" type="varchar" length="10" decimal="0" jt="12" mandatory="y" />
			<column name="hire_date" type="date" length="13" decimal="0" jt="91" mandatory="y" >
				<comment><![CDATA[(DC2Type:date_immutable)]]></comment>
			</column>
			<index name="employees_pkey" unique="PRIMARY_KEY" >
				<column name="id" />
			</index>
		</table>
		<table name="migration_versions" >
			<column name="version" type="varchar" length="255" decimal="0" jt="12" mandatory="y" />
			<index name="migration_versions_pkey" unique="PRIMARY_KEY" >
				<column name="version" />
			</index>
		</table>
		<table name="salaries" generator_rows="100" >
			<column name="id" type="integer" length="10" decimal="0" jt="4" mandatory="y" />
			<column name="emp_no_id" type="integer" length="10" decimal="0" jt="4" mandatory="y" />
			<column name="salary" type="numeric" length="2" decimal="0" jt="2" mandatory="y" />
			<column name="from_date" type="date" length="13" decimal="0" jt="91" mandatory="y" >
				<comment><![CDATA[(DC2Type:date_immutable)]]></comment>
			</column>
			<column name="to_date" type="date" length="13" decimal="0" jt="91" mandatory="y" >
				<comment><![CDATA[(DC2Type:date_immutable)]]></comment>
			</column>
			<index name="salaries_pkey" unique="PRIMARY_KEY" >
				<column name="id" />
			</index>
			<index name="uniq_e6eeb84b76e43d7d" unique="UNIQUE" >
				<column name="emp_no_id" />
			</index>
			<fk name="fk_e6eeb84b76e43d7d" to_schema="public" to_table="employees" >
				<fk_column name="emp_no_id" pk="id" />
			</fk>
		</table>
		<table name="services" >
			<column name="id" type="integer" length="10" decimal="0" jt="4" mandatory="y" />
			<column name="icono" type="varchar" length="100" decimal="0" jt="12" mandatory="y" />
			<column name="nombre" type="varchar" length="100" decimal="0" jt="12" mandatory="y" />
			<column name="descripcion" type="text" decimal="0" jt="12" mandatory="y" />
			<index name="services_pkey" unique="PRIMARY_KEY" >
				<column name="id" />
			</index>
		</table>
		<table name="works" >
			<column name="id" type="integer" length="10" decimal="0" jt="4" mandatory="y" />
			<column name="foto" type="varchar" length="100" decimal="0" jt="12" mandatory="y" />
			<column name="nombre" type="varchar" length="100" decimal="0" jt="12" mandatory="y" />
			<column name="descripcion" type="text" decimal="0" jt="12" mandatory="y" />
			<index name="works_pkey" unique="PRIMARY_KEY" >
				<column name="id" />
			</index>
		</table>
		<sequence name="contact_id_seq" start="1" />
		<sequence name="employees_id_seq" start="1" />
		<sequence name="salaries_id_seq" start="1" />
		<sequence name="services_id_seq" start="1" />
		<sequence name="works_id_seq" start="1" />
	</schema>
	<connector name="spot" database="PostgreSQL" driver_class="org.postgresql.Driver" driver_jar="postgresql-42.1.4.jar" driver_desc="Standard" host="localhost" port="5432" instance="spot" user="spot" passwd="VG9waWNvc1dlYg==" />
	<layout name="Default Layout" id="Layout_149cf86" show_relation="columns" >
		<entity schema="public" name="contact" color="c8f5bf" x="420" y="45" />
		<entity schema="public" name="migration_versions" color="c8f5bf" x="570" y="45" />
		<entity schema="public" name="services" color="c8f5bf" x="570" y="225" />
		<entity schema="public" name="works" color="c8f5bf" x="405" y="225" />
		<entity schema="public" name="employees" color="bfd4f5" x="45" y="45" />
		<entity schema="public" name="salaries" color="bfd4f5" x="210" y="45" />
	</layout>
	<layout name="Sample Layout with Tools" id="Layout_29567fd" show_column_type="y" show_relation="columns" >
		<entity schema="public" name="contact" color="c8f5bf" x="540" y="150" />
		<entity schema="public" name="employees" color="bfd4f5" x="45" y="150" />
		<entity schema="public" name="migration_versions" color="c8f5bf" x="750" y="150" />
		<entity schema="public" name="salaries" color="bfd4f5" x="285" y="150" />
		<entity schema="public" name="services" color="c8f5bf" x="750" y="330" />
		<entity schema="public" name="works" color="c8f5bf" x="525" y="330" />
		<callout x="45" y="75" pointer="NO" >
			<comment><![CDATA[Double-click any table, column or foreign key to edit, right-click to start one of the tools below.
Use the Relational Data Browse for simultaneously exploring data from multiple tables.
All tools will be saved to project file and can be reopen.]]></comment>
		</callout>
		<group name="employees" color="ecf0f7" >
			<entity schema="public" name="employees" />
			<entity schema="public" name="salaries" />
		</group>
		<group name="contact" color="eef7ec" >
			<entity schema="public" name="contact" />
			<entity schema="public" name="migration_versions" />
			<entity schema="public" name="services" />
			<entity schema="public" name="works" />
		</group>
		<script name="Sample SQL Editor" id="Editor_221ffec" language="SQL" >
			<string><![CDATA[SELECT * 
FROM
	"public".employees s;]]></string>
		</script>
		<browser id="Browse_16bafcc" name="Sample Relational Data Browse" confirm_updates="y" >
			<browse_table schema="public" entity="employees" x="20" y="20" width="400" height="300" >
				<browse_table schema="public" entity="salaries" fk="fk_e6eeb84b76e43d7d" x="440" y="20" width="500" height="350" />
			</browse_table>
		</browser>
		<query id="Query_5d24d22" name="Sample Query Builder" >
			<query_table schema="public" name="employees" alias="e" x="45" y="45" >
				<column name="id" />
				<column name="emp_no" />
				<column name="birth_date" />
				<column name="first_name" />
				<column name="last_name" />
				<column name="gender" />
				<column name="hire_date" />
				<query_table schema="public" name="salaries" alias="s" x="210" y="45" fk="fk_e6eeb84b76e43d7d" type="Inner Join" >
					<column name="id" />
					<column name="emp_no_id" />
					<column name="salary" />
					<column name="from_date" />
					<column name="to_date" />
				</query_table>
			</query_table>
		</query>
	</layout>
</project>