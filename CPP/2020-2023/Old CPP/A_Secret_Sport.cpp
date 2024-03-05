#include<bits/stdc++.h>
using namespace std;

typedef long long ll;


// policy Based ds
#include<ext/pb_ds/assoc_container.hpp>
using namespace __gnu_pbds;

typedef tree<long long , null_type, less_equal<long long>, rb_tree_tag,tree_order_statistics_node_update> ordered_set;

#define order(s, x) s.order_of_key(x) // return the number of elements in the set that are smaller than x
#define elemat(s ,x) s.find_by_order(x) // return poller to element at index x



typedef   vector<ll>  vl;
typedef   vector<pair<ll, ll>> vll;
typedef   multiset<pair<ll, ll>> msll;
typedef   multiset<ll> msl;
typedef   set<pair<ll, ll>> sll;
typedef   set<ll> sl;
typedef   map<ll, ll> mll;
typedef   pair<ll, ll>pll;

typedef   vector<ll>  vi;
typedef   vector<pair<ll, ll>> vii;
typedef   multiset<pair<ll, ll>> msii;
typedef   multiset<ll> msi;
typedef   set<pair<ll, ll>> sii;
typedef   set<ll> si;
typedef   map<ll, ll> mii;
typedef   pair<ll, ll>pii;


#define recap(i,k,n)  for(ll i = k; i>=n; i--)
#define rep(i,k,n)    for(ll i=k; i<n; i++)
#define boost 	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
#define for1(x, a, b)  for(x=a; x<b; x++)
#define for2(x, a, b)  for(x=a, x>=b; x--)
#define endl 	"\n"
#define all(x)  x.begin(), x.end()
#define mp      make_pair
#define read    freopen("today_is_gonna_be_a_great_day_input.txt","r",stdin)
#define write   freopen("output.txt","w",stdout)
#define pb      push_back
#define ff      first
#define ss      second
#define bb      begin
#define mem(arr, x) memset(arr, x, sizeof(arr));
#define arr_ub(arr, n, x) upper_bound(arr, arr+n, x)-arr
#define arr_lb(arr, n, x) lower_bound(arr, arr+n, x)-arr
#define u_p(v, x) upper_bound(v.begin(), v.end(), x)-v.begin()
#define l_b(v, x) lower_bound(v.begin(), v.end(), x)-v.begin()


const ll sz=1e6+123;
#define INF 1000000000000000007

#define stringLen 18446744073709551620
#define pi 3.1415926536
//const ll mod = 1e9 + 7;
inline void normal(ll &a, ll MOD) { a %= MOD; (a < 0) && (a += MOD); }
inline ll modMul(ll a, ll b, ll MOD) { a %= MOD, b %= MOD; normal(a, MOD), normal(b, MOD); return (a*b)%MOD; }
inline ll modAdd(ll a, ll b, ll MOD) { a %= MOD, b %= MOD; normal(a, MOD), normal(b, MOD); return (a+b)%MOD; }
inline ll modSub(ll a, ll b, ll MOD) { a %= MOD, b %= MOD; normal(a, MOD), normal(b, MOD); a -= b; normal(a, MOD); return a; }
inline ll modPow(ll b, ll p, ll MOD) { ll r = 1; while(p) { if(p&1) r = modMul(r, b, MOD); b = modMul(b, b, MOD); p >>= 1; } return r; }
inline ll modInverse(ll a, ll MOD) { return modPow(a, MOD-2, MOD); }
inline ll modDiv(ll a, ll b, ll MOD) { return modMul(a, modInverse(b, MOD), MOD); }



//vi divisorList[sz];
//ll divisorNumber[sz];
//void findDivisor(ll n){
//	  for(ll i=1; i<=n; i++){
//			for(ll j=i; j<=n; j+=i){
//				 divisorList[j].pb(i);
//		     	 divisorNumber[j]++;
//			}
//	  }
//}

bool isPalindrome(string s){ll i=0,j=s.size()-1;for(i,j;i<=j;i++,j--){if(s[i]!=s[j]) return 0;}return 1;}
//ll gcd(ll a, ll  b){return b==0? a: gcd(b, a%b);}
//// lcm * gcd = a*b
//ll lcm(ll a, ll b){if(a>b)swap(a, b);return a*(b/gcd(a, b));}
//bool isPalindrome(string s){ ll i=0,j=s.size()-1;for(i,j;i<=j;i++,j--){if(s[i]!=s[j]) return 0;} return 1;}
bool isPowerofTwo(ll n){return (n && !(n&(n-1)));}
//ll count_one(ll n){ll count=0;while(n){n &= (n-1);count++;}return count;}
//string binRep(ll n){string s="";ll f = 0;while(n>0){if(n%2){f=1;s+='1';}else s+='0';n/=2;}if(s.empty())return "0";else return s;}
//ll ctz(ll n){return __builtin_ctzll(n);}
//ll clz(ll n){return __builtin_clzll(n);}
//ll bitCount(ll n){return __builtin_popcountll(n);}

//bitset<sz> is_prime;
//vector<int>prime;
//
//void primeGen(ll n){
//     for(ll i=3; i<=n; i+=2)is_prime[i]=1;
//     ll nn = sqrt(n)+1;
//     for(ll i=3; i<nn; i+=2){
//		     if(is_prime[i]==0)continue;
//			for(ll j=i*i; j<=n; j+=(i+i)){
//				is_prime[j]=0;
//			}
//     }
//     is_prime[2]=1;
//     prime.pb(2);
//
//     for(int i=3; i<=n; i+=2){
//        if(is_prime[i]) prime.pb(i);
//     }
//}
//
///**
//Faisal Amin Abir(20-43206-1)
//**/
//
//
//vector<int>factorization(int n){
//	//O(sqrt(n)/ln(sqrt(n)) + log2 n)
//	vector<int>factors;
//	for(auto u:prime){
//		if(1LL*u*u > n) break;
//		if(n%u==0){
//			factors.push_back(u);//for generating unique factors keep this line here
//			while(n%(u)==0){
//				//factors.push_back(u);//for generating all factors keep this line here
//				n/=(u);
//			}
//		}
//	}
//	if(n>1)factors.push_back(n);
//	return factors;
//}
//
//ll NOD(long long n){
//	ll res=1;
//	for(auto u:prime){
//		if(1LL*u*u > n)break;
//		if(n%u==0){
//		      ll count=1;
//			while(n%u==0){
//				n/=u;
//				count++;
//			}
//			res *= count;
//		}
//	}
//	if(n>1)res*=2;
//	return res;
//}
//          R  D  L  U  uR dR dL uL

ll dx[] = {0, 1, 0,-1,-1, 1, 1, -1};
ll dy[] = {1, 0,-1, 0, 1, 1,-1, -1};



//--------------------------------------------------------------------------------------------------------------
//                                ** CODE STARTS HERE **
//--------------------------------------------------------------------------------------------------------------

void solve(){
    int n;
    cin>>n;
    string s;
    cin>>s;

    int fa=0, fb=0;
    int tot=0;
    for(int setwin=1; setwin<=n; setwin++){
        int flag=0;
        for(int wininset=1; wininset<=n; wininset++){

                int a=0, b=0;
                int atot=0, btot=0;
                int k=0;
                for(auto u:s){
                    k++;
                    if(u=='A')a++;
                    else b++;
                    int f=0;
                    if(a==wininset ){
                        atot++;
                        if(k == n) f=1;
                        a=0, b=0;
                    }
                    if(b==wininset){
                        btot++;
                        if(k==n)f=1;
                        a=0,b=0;
                    }
                    if(atot == setwin ){
                        if(f) {cout << "A" <<endl; return;}
                        else {
                            break;
                        }

                    }
                    if(btot == setwin){
                        if(f ){cout << "B" <<endl;
                            return;
                        }
                        else break;
                    }
                }


        }


    }
     cout << "?" << endl;

}

int main(){
	// boost;
    int t=1;
    cin>>t;

    for(int i=0; i<t; i++)
        solve();


	return 0;
}
