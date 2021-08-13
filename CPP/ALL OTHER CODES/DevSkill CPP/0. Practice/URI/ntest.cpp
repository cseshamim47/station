#include <iostream>
#include <stack>
#include <string>
using namespace std;

bool isExits(string bracket)
{
    stack<char> st;

    for (int i = 0; i < bracket.size(); i++)
    {
        char ch = bracket[i];
        if (ch == ')' || ch == ']'){

            if (!st.empty()){
                if(st.top() == '(' && ch == ')'){ 
                    // cout << st.top() << endl;
                    st.pop();
                    
                }
                else if(st.top() == '[' && ch == ']') {
                    // cout << st.top() << endl;
                    st.pop();
                }
            }else return false;

        }else if (ch == '(' || ch == '[') st.push(ch);
    }
    return st.empty();
}
 

int main()
{
    int n;
    string bracket;
    scanf("%d", &n);
    getchar();
    for (int i = 0; i < n; i++){
        getline(cin, bracket);
        if(bracket.size() == 0) cout << "Yes\n";
        else if(isExits(bracket)){
            printf("Yes\n");
        }else{
            printf("No\n");
        }
    }
    return 0;
}