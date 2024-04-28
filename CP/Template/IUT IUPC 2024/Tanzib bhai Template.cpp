>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> 

//o(nlog2(n))
vector < vector < int > > factor(1e6 + 5);
void find_factor(int number)
{
    for(int factor_index = 1; factor_index <= number; factor_index++)
        for(int index = factor_index; index <= number; index += factor_index)
            factor[index].push_back(factor_index);
}
//vector < bool > root_flag(1e6 + 5);
vector < int > lowest_root(1e7 + 10);
vector< int > root;
void build_root_table(int limit)
{
    for (int index = 2; index <= limit; index++)
    {
        //if(!root_flag[index])
            //root.push_back(index);
        if (!lowest_root[index])
        {
            lowest_root[index] = index;
            root.push_back(index);
        }
        for (int root_index = 0; index * root[root_index] <= limit; root_index++)
        {
            lowest_root[index * root[root_index]] = root[root_index];
            //root_flag[index * root[root_index]] = true;
            if(lowest_root[index] == root[root_index])
                break;
            //if(index % root[root_index] == 0)
                //break;
        }
    }
}
bool is_not(uint64_t number, uint64_t base, uint64_t exponent, int largest_iteration)
{
    uint64_t operated_number = modular_power(base, exponent, number);
    if (operated_number == 1 || operated_number == number - 1)
        return false;
    for (int iteration = 1; iteration < largest_iteration; iteration++) {
        operated_number = (__uint128_t)operated_number * operated_number % number;
        if (operated_number == number - 1)
            return false;
    }
    return true;
}
bool is_root(uint64_t number)
{
    if (number < 2)
        return false;
    int iteration = 0;
    uint64_t exponent = number - 1;
    while (~exponent & 1)
    {
        exponent >>= 1;
        iteration++;
    }
    for (int base : { 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37 })
    {
        if (number == base)
            return true;
        if (is_not(number, base, exponent, iteration))
            return false;
        if(number <= INT_MAX && base == 7)
            break;
    }
    return true;
}

long long minimized_overflow_modular_multiplication(uint64_t first_multiplier, uint64_t second_multiplier, uint64_t modulo)
{
    long long summand = 0, multiplier = first_multiplier % modulo;
    while (second_multiplier)
    {
        if (second_multiplier & 1)
            summand = (summand + multiplier) % modulo;
        multiplier = multiplier * 2 % modulo;
        second_multiplier >>= 1;
    }
    return summand % modulo;
}
long long rho_factorizer(long long number)
{
    int left_iteration = 0;
    int32_t right_iteration = 2;
    long long hare = 3, tortoise = 3; // random seed = 3, other values possible
    while (true)
    {
        left_iteration++;
        hare = (minimized_overflow_modular_multiplication(hare, hare, number) + number - 1) % number; // generating function
        long long factor = __gcd(abs(tortoise - hare), number); // the key insight
        if (factor != 1 && factor != number)
            return factor; // found one non-trivial factor
        if (left_iteration == right_iteration)
        {
            tortoise = hare;
            right_iteration <<= 1;
        }
    }
}
vector < long long > root_factorize(long long number)
{
    if(number < 2)
        return vector < long long > ();
    if(is_root(number))
        return vector < long long > {number};
    vector < long long > first_root_factor, second_root_factor;
    while(number > 1 && number <= 9999991LL)
    {
        first_root_factor.push_back(lowest_root[number]);
        number /= lowest_root[number];
    }
    if(number > 9999991LL)
    {
        long long factorizer = rho_factorizer(number);
        first_root_factor = root_factorize(factorizer);
        second_root_factor = root_factorize(number / factorizer);
        first_root_factor.insert(first_root_factor.end(), second_root_factor.begin(), second_root_factor.end());
    }
    return first_root_factor;
}


>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//segment tree 

//indexing 0 based, rooting 1 based 

struct tree_node{ 

    ll val; 

}; 

struct segment_node 

{ 

    //instead change 

    ll sum; 

}; 

segment_node merge_segment_node(segment_node left_segment_index, segment_node right_segment_index) 

{ 

    segment_node merged_segment_node; 

    //instead change 

    merged_segment_node.sum = left_segment_index.sum + right_segment_index.sum; 

    return merged_segment_node; 

} 

//instead change 

segment_node initialize_segment_node(tree_node delta){ 

    segment_node initialized_segment_node; 

    //instead change 

    initialized_segment_node.sum = delta.val; 

    return initialized_segment_node; 

} 

vector < tree_node > linier_tree; 

vector < segment_node > segment_tree; 

vector < pair < int, long long > > lazy_tree; 

void build_segment_tree(int root_index, int left_segment_index, int right_segment_index) 

{ 

    if (left_segment_index == right_segment_index) 

    { 

        segment_tree[root_index] = initialize_segment_node(linier_tree[left_segment_index]); 

        return; 

    } 

    int middle_segment_index = (left_segment_index + right_segment_index) >> 1; 

    build_segment_tree(root_index << 1, left_segment_index, middle_segment_index); 

    build_segment_tree(root_index << 1 | 1, middle_segment_index + 1, right_segment_index); 

    segment_tree[root_index] = merge_segment_node(segment_tree[root_index << 1], segment_tree[root_index << 1 | 1]); 

} 

 

void update_point_segment_tree(int root_index, int left_segment_index, int right_segment_index, int index, tree_node delta) 

{ 

    if (left_segment_index == right_segment_index) 

        segment_tree[root_index] = initialize_segment_node(delta); 

    else 

    { 

        int middle_segment_index = (left_segment_index + right_segment_index) >> 1; 

        if (index <= middle_segment_index) 

            update_point_segment_tree(root_index << 1, left_segment_index, middle_segment_index, index, delta); 

        else 

            update_point_segment_tree(root_index << 1 | 1, middle_segment_index + 1, right_segment_index, index, delta); 

        segment_tree[root_index] = merge_segment_node(segment_tree[root_index << 1], segment_tree[root_index << 1 | 1]); 

    } 

} 

void propagate_segment_tree(int root_index, int left_segment_index, int right_segment_index) 

{ 

    if(lazy_tree[root_index].first) 

    { 

        auto delta = lazy_tree[root_index]; 

        lazy_tree[root_index] = {0, 0}; 

        if(delta.first == 1)//range increment 

            segment_tree[root_index].sum += delta.second * (right_segment_index - left_segment_index + 1);//instead change 

        else//range replace 

            segment_tree[root_index].sum = delta.second * (right_segment_index - left_segment_index + 1);//instead change 

        if(left_segment_index == right_segment_index) 

                return; 

        if(delta.first == 1)//range increment 

        { 

            if(lazy_tree[root_index << 1].first) 

                lazy_tree[root_index << 1] = {lazy_tree[root_index << 1].first, lazy_tree[root_index << 1].second + delta.second};//instead change 

            else 

                lazy_tree[root_index << 1] = delta; 

            if(lazy_tree[root_index << 1 | 1].first) 

                lazy_tree[(root_index << 1)+ 1] = {lazy_tree[root_index << 1 | 1].first, lazy_tree[root_index << 1 | 1].second + delta.second};//instead change 

            else 

                lazy_tree[root_index << 1 | 1] = delta; 

        } 

        else//range replace 

        { 

            lazy_tree[root_index << 1] = delta; 

            lazy_tree[root_index << 1 | 1] = delta; 

        } 

    } 

} 

void update_range_segment_tree(int root_index, int left_segment_index, int right_segment_index, int left_index, int right_index, int type, long long delta) 

{ 

    propagate_segment_tree(root_index, left_segment_index, right_segment_index); 

    if (left_segment_index > right_index || right_segment_index < left_index) 

        return; 

    if(left_segment_index >= left_index && right_segment_index <= right_index) 

    { 

        lazy_tree[root_index] = {type, delta}; 

        propagate_segment_tree(root_index, left_segment_index, right_segment_index); 

        return; 

    } 

    int middle_segment_index = (left_segment_index + right_segment_index) >> 1; 

    update_range_segment_tree(root_index << 1, left_segment_index, middle_segment_index, left_index, middle_segment_index, type, delta); 

    update_range_segment_tree(root_index << 1 | 1, middle_segment_index + 1, right_segment_index, middle_segment_index + 1, right_index, type, delta); 

    segment_tree[root_index] = merge_segment_node(segment_tree[root_index << 1], segment_tree[root_index << 1 | 1]); 

} 

segment_node query_segment_tree(int root_index, int left_segment_index, int right_segment_index, int left_index, int right_index) 

{ 

    //instead range update 

    //propagate_segment_tree(root_index, left_segment_index, right_segment_index); 

    if (left_segment_index > right_index || right_segment_index < left_index) 

        return { 0 };//instead change 

    if(left_segment_index >= left_index && right_segment_index <= right_index) 

        return segment_tree[root_index]; 

    int middle_segment_index = (left_segment_index + right_segment_index) >> 1; 

    return merge_segment_node(query_segment_tree(root_index << 1, left_segment_index, middle_segment_index, left_index, right_index), query_segment_tree(root_index << 1 | 1, middle_segment_index + 1, right_segment_index, left_index, right_index)); 

} 
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> 

////MOBIOUS INVERSION 
int mu[sz]; 

void mu_1_to_n(int n){ 

    for(int i = 2; i <= n; i++){ 

        if(!mr[i]){ 

            for(int j = i; j <= n; j += i){ 

                if(j > i) 

                    mr[j] = true; 

                if(j % (i * i) == 0) 

                    mu[j] = 0; 

                else  

                    mu[j] = -mu[j]; 

            } 

        } 

    } 

} 

fill(mu, mu + n + 1, 1); 

    mu_1_to_n(n); 

    int c = 0; 

    for(int i = 1; i <= n; i++) 

        c += mu[i] * (n / (i * i)) * (n / (i * i)); 

>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> 

////2D BIT 

void upd(int n, int m, vector<vector<int>> &bit, int x, int y, int d) { 

    for (int i = x; i <= n; i += i & -i) 

        for (int j = y; j <= m; j += j & -j) 

            bit[i][j] += d; 

} 

int tot(vector<vector<int>> &bit, int x, int y) { 

    int ret = 0; 

    for (int i = x; i > 0; i -= i & -i) 

        for (int j = y; j > 0; j -= j & -j) 

            ret += bit[i][j]; 

    return ret; 

} 

void solve(){ 

    int n,q; 

    cin>>n>>q; 

    int a[n+3][n+3]; 

    for(int i=1;i<=n;i++) 

        for(int j=1;j<=n;j++){ 

            char c; 

            cin>>c; 

            c=='.'?a[i][j]=0:a[i][j]=1; 

        } 

    vector<vector<int>>FT(n+3,vector<int>(n+3)); 

    for(int i=1;i<=n;i++) 

        for(int j=1;j<=n;j++) 

            upd(n,n,FT,i,j,a[i][j]-0); 

    while(q--){ 

        int t; 

        cin>>t; 

        if(t==1){ 

            int x,y; 

            cin>>x>>y; 

            upd(n,n,FT,x,y,1-a[x][y]-a[x][y]); 

            a[x][y]=1-a[x][y]; 

        } 

        else{ 

            int x1,y1,x2,y2; 

            cin>>x1>>y1>>x2>>y2; 

            cout<<tot(FT,x2,y2)-tot(FT,x1-1,y2)-tot(FT,x2,y1-1)+tot(FT,x1-1,y1-1)<<endl; 

        } 

    }    

} 

>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> 

///HLD 

void dfs(int s, int p) { 

    dp[s] = 1; 

    int mx = 0; 

    for (auto i: adj[s]) if (i != p) { 

        par[i] = s; 

        depth[i] = depth[s] + 1; 

        dfs(i, s); 

        dp[s] += dp[i]; 

        if (dp[i] > mx) 

            mx = dp[i], heavy[s] = i; 

    } 

} 

  

int cnt = 0; 

void hld(int s, int h) { 

    head[s] = h; 

    id[s] = ++cnt; 

    update(id[s]-1, val[s]); 

    if (heavy[s]) 

        hld(heavy[s], h); 

    for (auto i: adj[s]) { 

        if (i != par[s] && i != heavy[s]) 

            hld(i, i); 

    } 

} 

int path(int x, int y){ 

    int ans = 0; 

    while (head[x] != head[y]) { 

        if (depth[head[x]] > depth[head[y]]) 

            swap(x, y); 

        ans = max(ans, query(id[head[y]]-1, id[y]-1)); 

        y = par[head[y]]; 

    } 

    if(depth[x] > depth[y]) 

        swap(x, y); 

    ans = max(ans, query(id[x]-1, id[y]-1)); 

    return ans; 

}

>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

const int N = 2E6;
long long first_base = 137, second_base = 277, MOD1 = 127657753, MOD2 = 987654319;
pair < long long, long long > base_power[N], inversed_base_power[N];
void precalculate_hash_power()
{
    base_power[0] = {1, 1};
    for (int i = 1; i < N; i++)
    {
        base_power[i].first = modular_multiplication(base_power[i - 1].first, first_base, MOD1);
        base_power[i].second = modular_multiplication(base_power[i - 1].second, second_base, MOD2);
    }

    long long inversed_first_base = inverse_modular_power(first_base, MOD1), inversed_second_base = inverse_modular_power(second_base, MOD2);
    inversed_base_power[0] = {1, 1};
    for (int i = 1; i < N; i++)
    {
        inversed_base_power[i].first = modular_multiplication(inversed_base_power[i - 1].first, inversed_first_base, MOD1);
        inversed_base_power[i].second = modular_multiplication(inversed_base_power[i - 1].second, inversed_second_base, MOD2);
    }
}

struct rolling_hash
{
    int n;
    string str;
    vector < pair < long long, long long > > forward_hash;
    vector < pair < long long, long long > > backward_hash;
    rolling_hash() {}
    rolling_hash(string &s)
    {
        str = s;
        n = str.size();
        forward_hash.emplace_back(0, 0);
        for (int forward_index = 0; forward_index < n; forward_index++)
        {
            pair < long long, long long > hashed_value;
            hashed_value.first = modular_addition(forward_hash[forward_index].first, modular_multiplication(1ll * str[forward_index], base_power[forward_index].first, MOD1), MOD1);
            hashed_value.second = modular_addition(forward_hash[forward_index].second, modular_multiplication(1ll * str[forward_index], base_power[forward_index].second, MOD2), MOD2);
            forward_hash.push_back(hashed_value);
        }

        backward_hash.emplace_back(0, 0);
        for (int forward_index = 0, backward_index = n - 1; forward_index < n; forward_index++, backward_index--)
        {
            pair < long long, long long > hashed_value;
            hashed_value.first = modular_addition(backward_hash[forward_index].first, modular_multiplication(1ll * str[forward_index], base_power[backward_index].first, MOD1), MOD1);
            hashed_value.second = modular_addition(backward_hash[forward_index].second, modular_multiplication(1ll * str[forward_index], base_power[backward_index].second, MOD2), MOD2);
            backward_hash.push_back(hashed_value);
        }
    }

    pair < long long, long long > forward_substring_hash(int left_index, int right_index)// 1 indexed
    {
        pair < long long, long long > hashed_value;
        hashed_value.first = modular_multiplication(modular_subtraction(forward_hash[right_index].first, forward_hash[left_index - 1].first, MOD1), inversed_base_power[left_index - 1].first, MOD1);
        hashed_value.second = modular_multiplication(modular_subtraction(forward_hash[right_index].second, forward_hash[left_index - 1].second, MOD2), inversed_base_power[left_index - 1].second, MOD2);
        return hashed_value;
    }
    pair<long long, long long> backward_substring_hash(int left_index, int right_index)// 1 indexed
    {
        pair < long long, long long > hashed_value;
        hashed_value.first = modular_multiplication(modular_subtraction(backward_hash[right_index].first, backward_hash[left_index - 1].first, MOD1), inversed_base_power[n - right_index].first, MOD1);
        hashed_value.second = modular_multiplication(modular_subtraction(backward_hash[right_index].second, backward_hash[left_index - 1].second, MOD2), inversed_base_power[n - right_index].second, MOD2);
        return hashed_value;
    }
    bool is_palindrome(int left_index, int right_index)
    {
        return forward_substring_hash(left_index, right_index) == backward_substring_hash(left_index, right_index);
    }
};

struct manachar
{
    int n;
    string str = "";
    vector < int > longest_palindrome;
    manachar() {}
    manachar(string &s)
    {
        for(auto chracter: s)
            str += string("#") + chracter;
        str += string("#");

        n = str.size();
        longest_palindrome.clear();
        longest_palindrome.resize(n, 1);
        for(int index = 1, left_index = 1, right_index = 1; index < n; index++)
        {
            longest_palindrome[index] = max(0, min(right_index - index, longest_palindrome[left_index + (right_index - index)]));
            while(index - longest_palindrome[index] >= 0  && index + longest_palindrome[index] < n && str[index - longest_palindrome[index]] == str[index + longest_palindrome[index]])
                longest_palindrome[index]++;
            if(index + longest_palindrome[index] > right_index)
                left_index = index - longest_palindrome[index], right_index = index + longest_palindrome[index];
            longest_palindrome[index]--;
        }
    }
    int retrive_longest_palindrome(int center, bool parity)
    {
        return longest_palindrome[2 * center + 1 + parity];
    }
    bool is_palindrome(int left_index, int right_index)
    {
        return right_index - left_index + 1 <= retrive_longest_palindrome((left_index + right_index) / 2, (right_index - left_index + 1) & 1);
    }
};
