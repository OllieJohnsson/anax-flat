#!/usr/bin/make -f
#
# Detect OS
OS = $(shell uname -s)

# Defaults
ECHO = echo

# Make adjustments based on OS
# http://stackoverflow.com/questions/3466166/how-to-check-if-running-in-cygwin-mac-or-linux/27776822#27776822
ifneq (, $(findstring CYGWIN, $(OS)))
	ECHO = /bin/echo -e
endif

# Colors and helptext
NO_COLOR	= \033[0m
ACTION		= \033[32;01m
OK_COLOR	= \033[32;01m
ERROR_COLOR	= \033[31;01m
WARN_COLOR	= \033[33;01m

# Which makefile am I in?
WHERE-AM-I = $(CURDIR)/$(word $(words $(MAKEFILE_LIST)),$(MAKEFILE_LIST))
THIS_MAKEFILE := $(call WHERE-AM-I)

# Echo some nice helptext based on the target comment
HELPTEXT = $(ECHO) "$(ACTION)--->" `egrep "^\# target: $(1) " "$(THIS_MAKEFILE)" | sed "s/\# target: $(1)[ ]*-[ ]* / /g"` "$(NO_COLOR)"

# Check version  and path to command and display on one line
CHECK_VERSION = printf "%-15s %-10s %s\n" "`basename $(1)`" "`$(1) --version $(2)`" "`which $(1)`"



# target: help                - Displays help.
.PHONY:  help
help:
	@$(call HELPTEXT,$@)
	@$(ECHO) "Usage:"
	@$(ECHO) " make [target] ..."
	@$(ECHO) "target:"
	@egrep "^# target:" Makefile | sed 's/# target: / /g'



# target: clean-cache         - Clear all cache files and set mode on cache dirs.
.PHONY: clean-cache
clean-cache:
	@$(call HELPTEXT,$@)
	rm -rf cache/*/*
	install -d -m 777 cache/cimage cache/anax



# target: site-build          - Copy default structure from Anax Flat.
.PHONY: site-build
site-build:
	@$(call HELPTEXT,$@)

	@$(ECHO) "$(ACTION)Copy from anax-flat$(NO_COLOR)"
	rsync -a vendor/mos/anax-flat/htdocs/ htdocs/
	rsync -a vendor/mos/anax-flat/config/ config/
	rsync -a vendor/mos/anax-flat/content/ content/
	rsync -a vendor/mos/anax-flat/view/ view/

	@$(ECHO) "$(ACTION)Copy from CImage$(NO_COLOR)"
	install -d htdocs/cimage
	rsync -a vendor/mos/cimage/webroot/imgd.php htdocs/cimage/imgd.php
	rsync -a vendor/mos/cimage/icc/ htdocs/cimage/icc/

	@$(ECHO) "$(ACTION)Create the directory for the cache items$(NO_COLOR)"
	install -d -m 777 cache/cimage cache/anax



# target: site-update         - Make composer update and copy latest files.
.PHONY: site-update
site-update:
	@$(call HELPTEXT,$@)
	composer update

	@$(ECHO) "$(ACTION)Copy Makefile$(NO_COLOR)"
	rsync -av vendor/mos/anax-flat/Makefile .

	@$(ECHO) "$(ACTION)Copy from CImage$(NO_COLOR)"
	rsync -a vendor/mos/cimage/webroot/imgd.php htdocs/cimage/imgd.php
	rsync -a vendor/mos/cimage/icc/ htdocs/cimage/icc/

	@$(ECHO) "$(ACTION)Create/Update the directory for the cache items$(NO_COLOR)"
	install -d -m 777 cache/cimage cache/anax



# target: theme               - Do make in theme/ subfolder.
.PHONY: theme
theme:
	@$(call HELPTEXT,$@)
	[ ! -d theme ] || $(MAKE) -C theme less-install



# # target: test                - Run tests.
# .PHONY: test
# test:
# 	@$(call HELPTEXT,$@)
# 	[ ! -d theme ] || $(MAKE) -C theme test
