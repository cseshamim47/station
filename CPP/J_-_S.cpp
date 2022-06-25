/*
*  author: shadril238
*/

#include<bits/stdc++.h>
using namespace std;

typedef long long ll;

// policy Based ds
#include<ext/pb_ds/assoc_container.hpp>
using namespace __gnu_pbds;

typedef tree<long long , null_type, less_equal<long long>, rb_tree_tag,tree_order_statistics_node_update> ordered_set;

#define order(s, x) s.order_of_key(x)
#define elemat(s, x) s.find_by_order(x)


typedef   vector<ll>  vi;
typedef   vector<pair<ll, ll>> vii;
typedef   multiset<pair<ll, ll>> msii;
typedef   multiset<ll> msi;
typedef   set<pair<ll, ll>> sii;
typedef   set<ll> si;
typedef   map<ll, ll> mii;

#define frac(x)             cout.unsetf(ios::floatfield); cout.precision(x); cout.setf(ios::fixed,ios::floatfield);
#define recap(i,k,n)        for(int i = k; i>=n; i--)
#define rep(i,k,n)          for(int i=k; i<n; i++)
#define shadril238          ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
#define for1(x, a, b)       for(x=a; x<b; x++)
#define for2(x, a, b)       for(x=a, x>=b; x--)
#define endl                "\n"
#define all(x)              x.begin(), x.end()
#define rall(x)             x.rbegin(), x.rend()
#define mp                  make_pair
#define read                freopen("input.txt","r",stdin)
#define write               freopen("output.txt","w",stdout)
#define pb                  push_back
#define ff                  first
#define ss                  second
#define bb                  begin
#define mem(arr, x)         memset(arr, x, sizeof(arr));
#define arr_ub(arr, n, x)   upper_bound(arr, arr+n, x)-arr
#define arr_lb(arr, n, x)   lower_bound(arr, arr+n, x)-arr
#define u_p(v, x)           upper_bound(v.begin(), v.end(), x)-v.begin()
#define l_b(v, x)           lower_bound(v.begin(), v.end(), x)-v.begin()

///debugging
#define ch                  printf("Came Here!!!!!!!!!!!!!!!\n")
#define deb(x)              cerr<<#x<<" :: "<<x<<" "
#define dnl                cerr<<endl


const ll sz=1e6+123;
#define INF 1000000000000000007
#define MOD 1000000007
#define stringLen 18446744073709551620
#define pi 3.1415926536

inline void normal(ll &a) { a %= MOD; (a < 0) && (a += MOD); }
inline ll modMul(ll a, ll b) { a %= MOD, b %= MOD; normal(a), normal(b); return (a*b)%MOD; }
inline ll modAdd(ll a, ll b) { a %= MOD, b %= MOD; normal(a), normal(b); return (a+b)%MOD; }
inline ll modSub(ll a, ll b) { a %= MOD, b %= MOD; normal(a), normal(b); a -= b; normal(a); return a; }
inline ll modPow(ll b, ll p) { ll r = 1; while(p) { if(p&1) r = modMul(r, b); b = modMul(b, b); p >>= 1; } return r; }
inline ll modInverse(ll a) { return modPow(a, MOD-2); }
inline ll modDiv(ll a, ll b) { return modMul(a, modInverse(b)); }


//vi divisorList[sz];
//ll divisorNumber[sz];
//void findDivisor(ll n){
//      for(ll i=1; i<=n; i++){
//            for(ll j=i; j<=n; j+=i){
//                 divisorList[j].pb(i);
//                 divisorNumber[j]++;
//            }
//      }
//}

//bool isPalindrome(string s){ll i=0,j=s.size()-1;for(i,j;i<=j;i++,j--){if(s[i]!=s[j]) return 0;}return 1;}
//ll gcd(ll a, ll  b){return b==0? a: gcd(b, a%b);}
//// lcm * gcd = a*b
//ll lcm(ll a, ll b){if(a>b)swap(a, b);return a*(b/gcd(a, b));}
//bool isPalindrome(string s){ ll i=0,j=s.size()-1;for(i,j;i<=j;i++,j--){if(s[i]!=s[j]) return 0;} return 1;}
//bool isPowerofTwo(ll n){return (n && !(n&(n-1)));}
//int count_one(ll n){int count=0;while(n){n &= (n-1);count++;}return count;}
//string binRep(ll n){string s="";int f = 0;while(n>0){if(n%2){f=1;s+='1';}else s+='0';n/=2;}if(s.empty())return "0";else return s;}
//int ctz(ll n){return __builtin_ctzll(n);}
//int clz(ll n){return __builtin_clzll(n);}
//int bitCount(ll n){return __builtin_popcountll(n);}

//bool isPrime(ll n){ ///Trial Division Method
//    ll x=sqrt(n);
//    if(n==1) return 0;
//    for(ll i=2;i<=x;i++)
//        if(n%i==0) return 0;
//    return 1;
//}

//bitset<sz>is_prime;
//vi prime;
//
//void primeGen(int n){
//     for(int i=3; i<=n; i+=2)is_prime[i]=1;
//     int nn = sqrt(n)+1;
//     for(ll i=3; i<nn; i+=2){
//            if(is_prime[i]==0)continue;
//            for(int j=i*i; j<=n; j+=(i+i)){
//                is_prime[j]=0;
//            }
//     }
//     is_prime[2]=1;
//     prime.pb(2);
//     for(int i=3; i<=n; i+=2){
//          if(is_prime[i])prime.pb(i);
//     }
//
//}
//
//vector<long long>primeDivisors[sz];
//long long primeDivisorNumbers[sz];
//void findPrimeDivisors(long long n){
//    for(auto u:prime){
//        for(long long i = u; i<=n; i+=u){
//            primeDivisors[i].push_back(u);
//            primeDivisorNumbers[i]++;
//        }
//    }
//}
//
//
//vector<long long>factorization(long long n){
//    //O(sqrt(n)/ln(sqrt(n)) + log2 n)
//    vector<long long>factors;
//    for(auto u:prime){
//        if(1LL*u*u > n) break;
//        if(n%u==0){
//        //  factors.push_back(u);//for generating unique factors keep this line here
//            while(n%(u)==0){
//                //factors.push_back(u);//for generating all factors keep this line here
//                n/=(u);
//            }
//        }
//    }
//    if(n>1)factors.push_back(n);
//    return factors;
//}
//
//int NOD(long long n){
//    int res=1;
//    for(auto u:prime){
//        if(1LL*u*u > n)break;
//        if(n%u==0){
//              int count=1;
//            while(n%u==0){
//                n/=u;
//                count++;
//            }
//            res *= count;
//        }
//    }
//    if(n>1)res*=2;
//    return res;
//}

///2^n
//ll pow(ll x){
//    ll res=1;
//    if(x==0)return res;
//    for(int i=1;i<=x;i++)res*=2;
//    return res;
//}

bool cmp(pair<ll,ll> a, pair<ll,ll> b){
    if(a.first = b.first) return a.second > b.second;
    return a.first > b.first;
}

//          R  D  L  U  uR dR dL uL
int dx[] = {0, 1, 0,-1,-1, 1, 1, -1};
int dy[] = {1, 0,-1, 0, 1, 1,-1, -1};


//--------------------------------------------------------------------------------------------------------------
//                                Code goes from here
//--------------------------------------------------------------------------------------------------------------

ll Case=0;
void solve(){
//  cout<<"Case #"<<++Case<<":"<<endl;
//  cout<<"HELLO SHADRIL!"<<endl;
	ll n;
	cin>>n;
	string s="";
	ll idx=0;
	map<char, vector<ll>> trk;
	for(ll i=0;i<n;i++){
		ll x;
		cin>>x;
		if(x==1){
			char p;
			cin>>p;
			s.pb(p);
			trk[p].pb(idx);
			idx++;
		}
		else if(x==2){
			if(s.size()!=0){
				
				trk[s[--idx]].pop_back();
				s.pop_back();
				
			}
		}
		else{
			char xx,yy;
			cin>>xx>>yy;
			ll pp=trk[xx].size();
			//deb(pp);dnl;
			for(ll j=0;j<pp;j++){
				if(s[trk[xx][j]]==xx){
					s[trk[xx][j]]=yy;
					trk[yy].pb(trk[xx][j]);
				}
			}
			trk[xx].clear();
		}
	}
	if(s.size()>0)cout<<s<<endl;
	else cout<<"The final string is empty"<<endl;

}
int main(){
    shadril238;
//  read;
//  write;
    int t=1;
    //cin>>t;
    while(t--)solve();
    return 0;
}

