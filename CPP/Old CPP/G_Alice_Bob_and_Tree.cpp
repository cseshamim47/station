// In the name of ALLAH
// cseshamim47
// 03-09-2022 20:10:57

#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define sett tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update >  /// cout<<*os.find_by_order(val)<<endl; // k-th element it /// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing ///  cout<<os.order_of_key(val)<<endl;  // strictly smaller or greater
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define pi(x)	printf("%d\n",x)
#define pl(x)	printf("%lld\n",x)
#define plg(x)	printf("%lld ",x)
#define ps(s)	printf("%s\n",s)
#define YES printf("YES\n")
#define NO printf("NO\n")
#define MONE printf("-1\n")
#define vi vector<int>
#define pb push_back
#define pf push_front
#define F first
#define S second
#define clr(x,y) memset(x, y, sizeof(x))
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define allg(x) x.begin(),x.end(),greater<int>()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }
template<typename T> istream& operator>>(istream& in, vector<T>& a) {for(auto &x : a) in >> x; return in;};
template<typename T> ostream& operator<<(ostream& out, vector<T>& a) {for(auto &x : a) out << x << ' ';nl; return out;};
template<typename T1, typename T2> ostream& operator<<(ostream& out, const pair<T1, T2>& x) {return out << x.f << ' ' << x.s;}
template<typename T1, typename T2> istream& operator>>(istream& in, pair<T1, T2>& x) {return in >> x.f >> x.s;}
template<typename T> void Unique(T &a) {a.erase(unique(a.begin(), a.end()), a.end());}
#define INF 1e9

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

int dx[] = {-1, 1, 0, 0,-1,-1, 1,1};
int dy[] = { 0, 0,-1, 1,-1, 1,-1,1};

class Graph
{
public:
	int V; // No. of vertices

	// Pointer to an array containing adjacency lists
	list<int> *adj;

	// Vector which stores degree of all vertices
	vector<int> degree;

	Graph(int V);		 // Constructor
	void addEdge(int v, int w); // To add an edge

	// function to get roots which give minimum height
	vector<int> rootForMinimumHeight();
    void Clear();
};

// Constructor of graph, initializes adjacency list and
// degree vector
void Graph::Clear()
{
    adj->clear();
    degree.clear();
}

Graph::Graph(int V)
{
	this->V = V;
	adj = new list<int>[V];
	for (int i = 0; i < V; i++)
		degree.push_back(0);
}

// addEdge method adds vertex to adjacency list and increases
// degree by 1
void Graph::addEdge(int v, int w)
{
	adj[v].push_back(w); // Add w to v’s list
	adj[w].push_back(v); // Add v to w’s list
	degree[v]++;		 // increment degree of v by 1
	degree[w]++;		 // increment degree of w by 1
}

// Method to return roots which gives minimum height to tree
vector<int> Graph::rootForMinimumHeight()
{
	queue<int> q;

	// first enqueue all leaf nodes in queue
	for (int i = 0; i < V; i++)
		if (degree[i] == 1)
			q.push(i);

	// loop until total vertex remains less than 2
	while (V > 2)
	{
		int popEle = q.size();
		V -= popEle;	 // popEle number of vertices will be popped
		
		for (int i = 0; i < popEle; i++)
		{
			int t = q.front();
			q.pop();

			// for each neighbour, decrease its degree and
			// if it become leaf, insert into queue
			for (auto j = adj[t].begin(); j != adj[t].end(); j++)
			{
				degree[*j]--;
				if (degree[*j] == 1)
					q.push(*j);
			}
		}
	}

	// copying the result from queue to result vector
	vector<int> res;
	while (!q.empty())
	{
		res.push_back(q.front());
		q.pop();
	}
	return res;
}


// Driver code

	

/////////////////////////

void f()
{}

int Case;

const int N = 30005;
bool vis[N];
vector<int> adj[N];
int level[N];
vi wt(N);

void dfs(int vertex)
{
    vis[vertex] = true;
    for(auto child : adj[vertex])
    {
        if(vis[child]) continue;
        level[child] = level[vertex]+1;
        dfs(child);
    }
}
void resetAll()
{
    for(int i = 0; i < N; i++)
    {
        vis[i] = false;
        wt[i] = 0;
        level[i] = 0;
        adj[i].clear();
    }
}
void reset()
{
    for(int i = 0; i < N; i++)
    {
        vis[i] = false;
        level[i] = 0;
    }
}

void solve()
{
    int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    n = in;
    Graph g(n);
    fo(i,n)
    {
        wt[i] = in;
    }
    fo(i,n-1)
    {
        a = in, b = in;
        a--;
        b--;
        adj[a].pb(b);
        adj[b].pb(a);
        g.addEdge(a, b);
    }

    dfs(1);
    int mxLevel,vertex;
    
    vertex = 0;
    mxLevel = 0;
    fo(i,n)
    {
        if(mxLevel < level[i])
        {
            mxLevel = level[i];
            vertex = i;
        }
    }

    reset();
    vector<pair<int,int>> out;
    out.pb({0,vertex});
    dfs(vertex);
    vertex = 0;
    mxLevel = 0;
    fo(i,n)
    {
        if(mxLevel < level[i])
        {
            mxLevel = level[i];
            vertex = i;
        }
    }
    out.pb({0,vertex});

		
	vector<int> res = g.rootForMinimumHeight();
	for (int i = 0; i < res.size(); i++)
		{
            // cout << res[i] << " ";
            out.pb({0,res[i]});

        }
	// // cout << endl;

    for(int k = 0; k < out.size(); k++)
    {
        sum = 0;
        int root = out[k].S;
        reset();
        // cout << root << endl;
        dfs(root);
        for(int i = 0; i < n; i++)
        {
            sum += (wt[root]-wt[i]) * (pow((-1),level[i]));
        }
        out[k].first = sum;
    }

    sort(all(out));
    int sz = out.size()-1;
    printf("Case %lld: ",++Case);
    if(sz < 0) 
    {
        cout << 0 << endl;
        return;
    }
    cout << out[sz].S+1 << endl;
    resetAll();
    g.Clear();

}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    w(t)
    // solve();
    // f();
}