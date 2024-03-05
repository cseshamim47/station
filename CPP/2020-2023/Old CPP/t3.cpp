const int N = 26;
struct node{
    bool endOfWord;
    node* arr[N];
};

node* getNode()
{
    node* n = new node;
    n->endOfWord = false;

    for(int i = 0; i < N; i++)
    {
        n->arr[i] = NULL;
    }
    return n;
}

void insert(node *root, string str)
{
    node *tmpRoot = root;

    for(int i = 0; i < str.size(); i++)
    {
        int index = str[i]-'a';
        if(tmpRoot->arr[index] == NULL)
        {
            tmpRoot->arr[index] = getNode();
        }
        tmpRoot = tmpRoot->arr[index];
    }
    tmpRoot->endOfWord = true;
}

bool search(node *root, string str)
{
    node *tmpRoot = root;

    for(int i = 0; i < str.size(); i++)
    {
        int index = str[i]-'a';
        if(tmpRoot->arr[index] == NULL) return false;
        tmpRoot = tmpRoot->arr[index];
    }
    return tmpRoot->endOfWord;
}

void deleteTrie(node *root)
{
    for(int i = 0; i < N; i++)
    {
        if(root->arr[i])
        {
            deleteTrie(root->arr[i]);
        }
    }
    delete root;
}

void solveTrie()
{
    node* root = getNode();
    while(true)
    {
        string str;
        int type;
        cin >> type;
        if(type == 1)
        {
            cout << "Enter your string: ";
            cin >> str;
            insert(root,str);
        }else 
        {
            cout << "Enter String to search: ";
            cin >> str;
            cout << search(root,str) << endl;
        }
    }
}

