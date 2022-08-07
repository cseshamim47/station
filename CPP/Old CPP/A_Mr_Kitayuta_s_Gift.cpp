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
    string str = in;
    n = s(str);
    i = 0, j = n-1;
    while(i < j && str[i] == str[j]) i++,j--;

    string ans = "";
    if(i == j)
    {
        ans = str.substr(0,i+1);
        ans += str[i];
        ans += str.substr(i+1,n);

    }else if(i < j)
    {
        int ii = i+1;
        int jj = j;
        while(ii < jj && str[ii] == str[jj]) ii++,jj--;
        if(ii >= jj) 
        {
            ans = str.substr(0,j+1);
            ans += str[i];
            ans += str.substr(j+1,n);

        }else if(str[i] == str[j-1])
        {
            ans = str.substr(0,i);
            ans += str[j];
            ans += str.substr(i,n);
        }
    }else if(i > j)
    {
        // i--;
        ans = str.substr(0,i);
        ans += 'y';
        ans += str.substr(i,n);
    }

    i = 0;
    j = s(ans)-1;
    // j = n;
    // cout << s(ans);
    
    while(i < j)
    {
        // cout << ans[i] << " " << ans[j] << endl;
        if(ans[i] != ans[j]) 
        {
            cout << "NA" << endl;
            return;
        }
        i++;
        j--;
    }

    if(s(ans)==n+1)
    cout << ans << endl;
    else
    cout << "NA" << endl;

}

int32_t main()
{
      //        Bismillah
    // fileInput();
    // BOOST
    // w(t)
    solve();
    // f();
}