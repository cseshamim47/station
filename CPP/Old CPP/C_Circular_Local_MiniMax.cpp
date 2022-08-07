#include <bits/stdc++.h>
#include <ext/pb_ds/assoc_container.hpp>
using namespace std;
using namespace __gnu_pbds;

#define int long long
#define ll unsigned long long
#define MAX 1000006
typedef tree<int, null_type, less_equal<int>, rb_tree_tag, tree_order_statistics_node_update > ordered_set;
// less_equal = multiset, less = set, greater_equal = multiset decreasing, greater = set decreaseing
/// cout<<*X.find_by_order(1)<<endl; // iterator to the k-th element
/// cout<<X.order_of_key(-5)<<endl;  // number of items in a set that are strictly smaller than our item
#define fo(i,n) for(i=0;i<n;i++)
#define Fo(i,k,n) for(i=k;k<n?i<n:i>n;k<n?i+=1:i-=1)
#define pi(x)	printf("%d\n",x)
#define pl(x)	printf("%lld\n",x)
#define plg(x)	printf("%lld ",x)
#define ps(s)	printf("%s\n",s)
#define Y printf("YES\n");
#define N printf("NO\n");
#define vi vector<int>
#define pb push_back
#define pf push_front
#define deb(x) cout << #x << "=" << x << endl
#define deb2(x, y) cout << #x << "=" << x << "," << #y << "=" << y << endl
#define sq(x)  ( (x)*(x) )
#define s(x)   x.size()
#define all(x) x.begin(),x.end()
#define BOOST ios_base::sync_with_stdio(false);cin.tie(NULL);cout.tie(NULL);
#define nl printf("\n");
#define endl "\n"
#define w(t) int t; cin >> t; while(t--){ solve(); }

struct{
    template<class T> operator T() {
        T x;
        cin >> x;
        return x;
    }
}in;

void fileInput()
{
    #ifndef ONLINE_JUDGE
        freopen("input.txt", "r", stdin);
        freopen("output.txt", "w", stdout);
    #endif
}

int gcd(int a, int b)
{
    if(!b) return a;
    return gcd(b,a%b);
}

void f()
{}

int Case;
void solve()
{
    int i,j,m,n;
    n = in;
    vi v(n);
    map<int,int> mp;
    fo(i,n)
    {
        v[i] = in;	
        mp[v[i]]++;
    }

    sort(all(v));

    vi ans;

    int l = 0;
    int r = n-1;
    while(l < r)
    {

        ans.push_back(v[l]);
        ans.push_back(v[r]);
        l++;
        r--;
    }
    if(n&1)
    {
        N
        return;
    }

    // i = n - 1 ;
    // j = (n - 1)/2;
    // vi nums(n,0);
    // for(int l = 0; l < n; l +=2){
    //     nums[l] = v[j--];
    // }
    // for(int l = 1; l < n; l +=2){
    //     nums[l] = v[i--];
    // }
    // fo(i,n) ans.push_back(nums[i]);
    
    int a = ans[0];
    int b = ans[1];
    ans.push_back(a);
    ans.push_back(b);
    

    bool ok = true;
    Fo(i,1,s(ans)-1)
    {
        if(ans[i] > ans[i-1] && ans[i] > ans[i+1]) continue;
        else if(ans[i] < ans[i-1] && ans[i] < ans[i+1]) continue;
        else 
        {
            N
            return;
        }
    }
    
        Y
        Fo(i,0,n) cout << ans[i] << " ";nl
        
    
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