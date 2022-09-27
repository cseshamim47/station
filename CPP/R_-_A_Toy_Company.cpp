// In the name of ALLAH
// cseshamim47
// 05-09-2022 02:56:27


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

int g;
struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

int dx[] = {-1, 1, 0, 0,-1,-1, 1,1};
int dy[] = { 0, 0,-1, 1,-1, 1,-1,1};

void f()
{}

int Case;

// vector<string> s[55];
int q;
string a,b;
map<string,bool> enemy;
map<string,bool> vis;
map<string,int> level;

char nextVal(char c)
{
    if(c == 'z') return 'a';
    else return c+1;
}
char prevVal(char c)
{
    if(c == 'a') return 'z';
    else return c-1;
}

vector<string> allPossibleWay(string str)
{
    string tmp = "";
    vector<string> out;
    for(int i = 0; i < 3; i++)
    {
        tmp = str;
        tmp[i] = nextVal(tmp[i]);
        out.pb(tmp);
        tmp = str;
        tmp[i] = prevVal(tmp[i]);
        out.pb(tmp);
    }
    return out;
}

bool isValid(string str)
{
    if(vis[str] || vis[b] || enemy[str]) return false;
    else return true;
}

void bfs(string source)
{
    if(!isValid(source)) return;
    queue<string> q;
    q.push(source);
    vis[source] = true;
    level[source] = 0;

    while(q.empty() == false)
    {
        string curWord = q.front();
        q.pop();
        auto getAll = allPossibleWay(curWord);
        for(auto x : getAll)
        {
            // cout << x << endl;
            if(isValid(x))
            {
                q.push(x);
                level[x] = level[curWord] + 1;
                vis[x] = true;
            }
        }        

    }
}
void clear()
{
    vis.clear();
    level.clear();
    enemy.clear();
}
void solve()
{
    // int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
    int i;
    cin >> a;
    cin >> b;
    cin >> q;
    clear();
    fo(i,q)
    {
        string str[3];
        for(int j = 0; j < 3; j++)
        {
            cin >> str[j];
        }

        string aa = str[0];
        string bb = str[1];
        string cc = str[2];
        for(int j = 0; j < aa.size(); j++)
        {
            for(int k = 0; k < bb.size(); k++)
            {
                for(int l = 0; l < cc.size(); l++)
                {
                    string tmp;
                    tmp += aa[j];
                    tmp += bb[k];
                    tmp += cc[l];
                    // cout << tmp << endl;
                    enemy[tmp] = true;
                }
            }
        }
    }
    bfs(a);

    printf("Case %lld: ",++Case);
    if(vis[b])
    {
        cout << level[b] << endl;
    }else
    {
        cout << -1 << endl;
    }
    // if(isValid("aac")) cout << "valid" << endl;
    // else cout << "not valid" << endl;

    
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