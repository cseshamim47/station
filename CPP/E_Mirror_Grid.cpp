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
#define MAX 1000006

int g;
struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

void f()
{}


vector<vector<char>> rotate(vector<vector<char>> &tmp,int n)
{
    //transpose
    vector<vector<char>> ret = tmp;
    // ret.resize(n,vector<char>());
    int i = 0,j = 0;    
    fo(i,n)
    {
        fo(j,n)
        {
            ret[j][i] = tmp[i][j];
        }
    }
    // YES;
    fo(i,n)
    {
        fo(j,n/2)
        {
            swap(ret[i][j],ret[i][n-j-1]);
        }
    }

    return ret;   

}

int Case;
void solve()
{
    int i=0,j=0,m=0,n=0,k=0,ans=0,cnt=0,odd=0,even=0;
    n = in;
    vector<vector<char>> v;
    vector<vector<char>> v1;
    vector<vector<char>> v2;
    vector<vector<char>> v3;

    fo(i,n)
    {
        vector<char> tmp(n);
        fo(j,n)
        {
            tmp[j] = in; 
        }
        v.pb(tmp);
    }

    v1 = rotate(v,n);
    v2 = rotate(v1,n);
    v3 = rotate(v2,n);
    k = 1;
    m = 0;
    fo(i,n/2)
    {
        for(j = m; j < n-k; j++)
        {
            // YES;
            
            int z = 0, o = 0;
            if(v[i][j] == '0') z++;
            else o++;
            if(v1[i][j] == '0') z++;
            else o++;
            if(v2[i][j] == '0') z++;
            else o++;
            if(v3[i][j] == '0') z++;
            else o++;

            ans += min(o,z);
        }
        m++;
        k++;
    }
    cout << ans << endl;

       

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


/* 
11001
00000
11111
10110
01111
1+

a b c
d e f
h j i

c b a
f e d
i j h


*/