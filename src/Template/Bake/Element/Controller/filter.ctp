<%
$associations = array_merge(
    $this->Bake->aliasExtractor($modelObj, 'BelongsTo'),
    $this->Bake->aliasExtractor($modelObj, 'BelongsToMany')
);

$ITER = 0;
$COMPACT = [];
$ASSOCIATION = [];
foreach ($associations as $assoc):
    $association = $modelObj->association($assoc);
    $otherName = $association->target()->alias();
    $otherPlural = $this->_variableName($otherName);
    $ASSOCIATION[$ITER]['otherName'] = $otherName;
    $ASSOCIATION[$ITER]['otherPlural'] = $otherPlural;
    $COMPACT[] = "'$otherPlural'";
    $ITER++;
endforeach;
%>

    /**
     * Filter method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function filter($action = 'set') {
        $<%= $singularName %> = $this-><%= $currentModelName %>->newEntity();
        if ($this->request->session()->check('<%= $currentModelName %>')) {
            $session = $this->request->session()->read('<%= $currentModelName %>');
            $<%= $singularName %> = $this-><%= $currentModelName %>->patchEntity($<%= $singularName %>,  $session);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($action == 'unset') {
                $this->request->session()->delete('<%= $currentModelName %>');
            } else {
                $this->request->session()->write('<%= $currentModelName %>', $this->request->data);
            }
            $this->Flash->success('The <%= strtolower($singularHumanName) %> has been saved.');
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * This function is used to filter where conditions
     * 
     * @return type
     */
    public function filteredWhereConditions() {
        $filter = [];
        return $filter;
    }

    /**
     * This function is used to filter select options
     */
    public function filteredSelectOptions() {
<% if(count($ASSOCIATION) > 0) { %>
<% foreach ($ASSOCIATION as $row): %>
        $<%= $row['otherPlural'] %> = $this-><%= $currentModelName %>-><%= $row['otherName'] %>->find('list', ['limit' => 200]);
<% endforeach; %>
        $this->set(compact(<%= join(', ', $COMPACT) %>));
<% } else { %>
        return false;
<% } %>
    }
    