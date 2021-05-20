#include <bits/stdc++.h>
using namespace std;

void rprint(deque<char> &name){
    deque<char>::reverse_iterator it;
    for(it = name.rbegin(); it != name.rend(); ++it){
        printf("%c ", *it);
    }
    printf("\n");
}
void print(const deque<char> &name){
    deque<char>::const_iterator it;
    for(it = name.begin(); it != name.end(); ++it){
        printf("%c ", *it);
    }
    printf("\n");
}


int main()
{
    deque<char> name; //shamim
    deque<int> d;
    name.push_back('m');
    name.push_front('a');
    name.push_back('i');
    name.push_front('h');
    name.push_back('m');
    name.push_front('s');

    print(name);
    rprint(name);

    printf("char at(5) : %c\n", name.at(5));   
    printf("max size of int : %d\n", d.max_size());
    printf("size of name : %d\n", name.size());

    name.pop_front();
    name.pop_back();

    printf("After popping : ");
    print(name);
    
}