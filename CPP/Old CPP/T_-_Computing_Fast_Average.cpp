    // In the name of ALLAH
    // cseshamim47
    // 01-12-2022 12:39:04

    #include <bits/stdc++.h>
    #include <ext/pb_ds/assoc_container.hpp>
    using namespace std;
    using namespace __gnu_pbds;

    #define int long long
    #define ll unsigned long long
    #define uset tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update >  /// cout<<*os.find_by_order(val)<<endl; // k-th element it /// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing ///  cout<<os.order_of_key(val)<<endl;  // strictly smaller or greater
    #define fo(i,n) for(i=0;i<n;i++)
    #define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
    #define YES printf("YES\n")
    #define NO printf("NO\n")
    #define MONE printf("-1\n")
    #define vi vector<int>
    #define vii vector<pair<int,int>>
    #define pii pair<int,int>
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
    template<typename T1, typename T2> ostream& operator<<(ostream& out, const pair<T1, T2>& x) {return out << x.F << ' ' << x.S  << endl;}
    template<typename T1, typename T2> istream& operator>>(istream& in, pair<T1, T2>& x) {return in >> x.F >> x.S;}
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


    // Segment Tree with Lazy Propagation start
    const int mx = 1e6+10;
    int arr[mx];
    struct
    {

        int sum,prop;
        bool pending;
    }Tree[mx*4];

    void init(int node, int b, int e) // O(NlogN)
    {
        if(b==e)
        {
            Tree[node].sum = arr[b];
            Tree[node].prop = 0;
            return;
        }
        int mid = (b+e)/2;
        int left = node*2;
        int right = (node*2)+1;
        init(left,b,mid);
        init(right,mid+1,e);
        Tree[node].sum = Tree[left].sum+Tree[right].sum;    
    }

    void push(int node, int b, int e)
    {
        if(b != e)
        {
            int mid = (b+e)/2;
            int left = node*2;
            int right = left+1;
            Tree[left].sum = (mid-b+1)*Tree[node].prop;
            Tree[right].sum = (e-mid)*Tree[node].prop;
            Tree[left].prop = Tree[node].prop;
            Tree[right].prop = Tree[node].prop;
            Tree[left].pending = true;
            Tree[right].pending = true;
        }
        Tree[node].pending = false;
        Tree[node].prop = 0;
    }
    void update(int node,int b, int e, int l, int r, int val) // O(4*logN)
    {
        if(Tree[node].pending == true)
        {
            push(node,b,e);
        }
        if(l > e || r < b) return;
        if(l <= b && r >= e)
        {
            Tree[node].sum = (val*(e-b+1));
            Tree[node].prop = val;
            Tree[node].pending = true;
            if(Tree[node].pending == true)
            {
                push(node,b,e);
            }
            return;
        }
        int mid = (b+e)/2;
        int left = node*2;
        int right = (node*2)+1;
        update(left,b,mid,l,r,val);
        update(right,mid+1,e,l,r,val);
        Tree[node].sum = Tree[left].sum+Tree[right].sum;  
    }
    int query(int node,int b,int e,int l,int r) // O(4*logN)
    {
        if(Tree[node].pending == true)
        {
            push(node,b,e);
        }
        if(l > e || r < b) return 0;
        if(l <= b && r >= e)
        {
            return Tree[node].sum;
        }
        int mid = (b+e)/2;
        int left = node*2;
        int right = (node*2)+1;
        int val1 = query(left,b,mid,l,r);
        int val2 = query(right,mid+1,e,l,r);
        return val1 + val2;
    }

    // Segment Tree with Lazy Propagation end

    void solve()
    {
        int a=0,b=0,i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0,sum=0,l=0,r=0,p=0,q=0;
        n = in, k = in;
        fo(i,mx)
        {
            arr[i] = 0;
            Tree[i].sum = 0;
            Tree[i].prop = 0;
        }
        init(1,1,n);
        printf("Case %lld:\n",++Case);
        while(k--)
        {
            // deb(query(1,1,n,18,18));
            int typ = in;
            if(typ == 1)
            {
                cin >> a >> b >> m;
                a++;
                b++;
                // m++;
                update(1,1,n,a,b,m);
                // deb(query(1,1,n,a,b));
            }else
            {
                cin >> a >> b;
                a++;
                b++;
                sum = query(1,1,n,a,b);
                int hor = (b-a+1);
                // sum-=hor;
                if(sum%hor == 0)
                {
                    cout << (sum/hor) << endl;
                    continue;
                }
                m = __gcd(hor,sum);
                hor/=m;
                sum/=m;
                cout << sum << "/" << hor << endl;
            }
        }
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